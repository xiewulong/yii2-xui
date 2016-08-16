<?php
/*!
 * yii - widget - banner
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/15
 * update: 2016/8/15
 * since: 0.0.2
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Banner extends Widget {

	public $tag = 'div';

	public $options = [];

	public $items = [];

	public $itemOptions = [];

	public $target = '_blank';

	public $backgroundImage = false;

	public function run() {
		return empty($this->items) ? null : Html::tag($this->tag, $this->renderItems(), $this->options);
	}

	protected function renderItems() {
		$itemOptions = $this->itemOptions;
		$target = $this->target;
		$backgroundImage = $this->backgroundImage;

		return Html::ul($this->items, [
			'item' => function($item) use($itemOptions, $backgroundImage, $target) {
				$aOptions = ['target' => $target];
				if($backgroundImage) {
					$aOptions['style'] = 'background-image:url(' . $item['src'] . ');';
				}
				$content = Html::a($backgroundImage ? null : Html::img($item['src'])
						, isset($item['url']) ? $item['url'] : null
						, $aOptions);

				return Html::tag('li', $content, $itemOptions);
			},
		]);
	}

}
