<?php
/*!
 * yii - widget - list
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/15
 * update: 2016/8/25
 * since: 0.0.2
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Ul extends Widget {

	public $tag = 'div';

	public $options = [];

	public $listOptions = [];

	public $items = [];

	public $itemOptions = [];

	public $backgroundImage = false;

	public $targetBlank = false;

	public function run() {
		return empty($this->items) ? null : Html::tag($this->tag, $this->renderItems(), $this->options);
	}

	protected function renderItems() {
		return Html::ul($this->items, array_merge([
			'item' => function($item) {
				$_content = [];
				$_options = [];
				if(isset($item['src']) && $item['src']) {
					if($this->backgroundImage) {
						$_options['style'] = 'background-image:url(' . $item['src'] . ');';
					} else {
						$_content[] = Html::tag('b', Html::img($item['src']));
					}
				}
				if(isset($item['title']) && $item['title']) {
					$_content[] = Html::tag('div', $item['title'], ['class' => 'title']);
				}
				if(isset($item['description']) && $item['description']) {
					$_content[] = Html::tag('div', $item['description'], ['class' => 'description']);
				}
				if($this->targetBlank) {
					$_options['target'] = '_blank';
				}
				$content = Html::a(implode('', $_content), isset($item['url']) ? $item['url'] : null, $_options);

				$itemOptions = $this->itemOptions;
				if(isset($item['options'])) {
					$itemOptions = array_merge($item['options'], $itemOptions);
				}

				return Html::tag('li', $content, $itemOptions);
			},
		], $this->listOptions));
	}

}
