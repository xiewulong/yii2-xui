<?php
/*!
 * yii - widget - list
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/15
 * update: 2016/8/19
 * since: 0.0.2
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Ul extends Widget {

	public $tag = 'div';

	public $options = [];

	public $items = [];

	public $itemOptions = [];

	public $backgroundImage = false;

	public $blankTarget = false;

	public function run() {
		return empty($this->items) ? null : Html::tag($this->tag, $this->renderItems(), $this->options);
	}

	protected function renderItems() {
		$itemOptions = $this->itemOptions;
		$backgroundImage = $this->backgroundImage;
		$blankTarget = $this->blankTarget;

		return Html::ul($this->items, [
			'item' => function($item) use($itemOptions, $backgroundImage, $blankTarget) {
				$_content = [];
				$_options = [];
				if(isset($item['src'])) {
					if($backgroundImage) {
						$_options['style'] = 'background-image:url(' . $item['src'] . ');';
					} else {
						$_content[] = Html::tag('b', Html::img($item['src']));
					}
				}
				if(isset($item['title'])) {
					$_content[] = Html::tag('div', $item['title'], ['class' => 'title']);
				}
				if(isset($item['description'])) {
					$_content[] = Html::tag('div', $item['description'], ['class' => 'description']);
				}
				if($blankTarget) {
					$_options['target'] = '_blank';
				}
				$content = Html::a(implode('', $_content), isset($item['url']) ? $item['url'] : null, $_options);

				return Html::tag('li', $content, $itemOptions);
			},
		]);
	}

}
