<?php
/*!
 * yii - widget - admin
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/2
 * update: 2016/8/10
 * since: 0.0.2
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Admin extends Widget {

	public $asset = 'yii\xui\AdminAsset';

	public $enableTypes = [
		'dropdown',
		'dropdownMixed',
		'sidebar',
		'children',
	];

	public $brand = [];

	public $menus = [];

	public $content;

	private $_sidebars = [];

	public function init() {
		parent::init();

		$this->asset::register($this->getView());
	}

	public function run() {
		return $this->render('Admin', [
			'brand' => $this->brandHtml,
			'content' => $this->content,
			'mainMenu' => $this->mainMenu,
			'sidebar' => isset($this->_sidebars[0]) ? $this->_sidebars[0] : null,
			'subSidebar' => isset($this->_sidebars[1]) ? $this->_sidebars[1] : null,
		]);
	}

	protected function getBrandHtml() {
		if(empty($this->brand) || !is_array($this->brand)) {
			return null;
		}

		$content = '';
		if(isset($this->brand['logo'])) {
			$content .= Html::tag('strong', Html::img($this->brand['logo']));
		}
		if(isset($this->brand['text'])) {
			$content .= Html::tag('h1', $this->brand['text']);
		}

		return isset($this->brand['url']) ? Html::a($content, $this->brand['url']) : $content;
	}

	protected function getMainMenu() {
		return $this->renderItems()[0];
	}

	protected function renderItems($items = [], $type = 'main', $sidebar = false) {
		if(empty($items)) {
			$items = $this->menus;
		}

		$active = false;
		$html = !empty($items) && is_array($items) ? Html::ul($items, [
			'class' => 'clearfix ' . $type,
			'item' => function($item, $index) use($type, $sidebar, &$active) {
				if(!$this->checkUserCan($item)) return null;

				$text = $item['text'];
				if($type == 'sidebar' && isset($item['children'])) {
					$text = Html::tag('em', Html::tag('i', null, ['class' => 'glyphicon glyphicon-triangle-bottom'])) . $text;
				} else if(isset($item['dropdown']) || isset($item['dropdown-mixed'])) {
					$text .= Html::tag('i', null, ['class' => 'glyphicon glyphicon-triangle-bottom']);
				} else if(isset($item['icon'])) {
					$icon = Html::tag('i', null, ['class' => $item['icon']]);
					$text = ($sidebar ? Html::tag('em', $icon) : $icon) . $text;
				}

				$content = isset($item['url']) ? Html::a($text, $item['url'], ['class' => 'text']) : Html::tag(isset($item['tagName']) ? $item['tagName'] : 'div', $text, ['class' => 'text']);
				$options = isset($item['options']) ? $item['options'] : [];

				for($i = 0, $len = count($this->enableTypes); $i < $len; $i++) {
					$subType = $this->enableTypes[$i];
					if(isset($item[$subType]) && is_array($item[$subType]) && !empty($item[$subType])) {
						if($subType == 'dropdownMixed') {
							$content .= Html::tag('div', implode('', $item[$subType]), ['class' => 'dropdown-mixed']);
							$_active = false;
						} else {
							list($_content, $_active) = $this->renderItems($item[$subType], $subType, $sidebar || $subType == 'sidebar');
							if($subType == 'sidebar') {
								if($_active) array_unshift($this->_sidebars, $_content);
							} else {
								$content .= $_content;
							}
						}
						if($_active) {
							$this->addClassToOptions('active', $options);
							$active = true;
						}
					}
				}

				if(isset($item['url']) && $this->checkCurrent($item['url'])) {
					$this->addClassToOptions('current', $options);
					$active = true;
				}

				return Html::tag('li', $content, $options);
			},
		]) : null;

		return [$html, $active];
	}

	protected function checkCurrent($url) {
		if(is_array($url)) {
			$url = $url[0];
		}
		// if($pos = strpos($url, '?')) {
		// 	$url = substr($url, 0, $pos);
		// }
		if(strncmp($url, '/', 1) === 0) {
			$url = ltrim($url, '/');
		}

		return \Yii::$app->security->compareString($url, isset(\Yii::$app->view->params['parent']) ? trim(\Yii::$app->view->params['parent'], '/') : \Yii::$app->controller->route);
	}

	protected function checkUserCan($item) {
		return isset($item['permission']) ? \Yii::$app->user->can($item['permission']) : true;
	}

	private function addClassToOptions($class, &$options) {
		$options['class'] = isset($options['class']) ? $options['class'] . ' ' . $class : $class;
	}

}
