<?php
/*!
 * xui - fullscreen background widget
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/13
 * update: 2016/8/2
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class FullscreenBackground extends Widget {

	public $addClass;

	public $path;

	public $images = [];

	public function init() {
		parent::init();

		FullscreenBackgroundAsset::register($this->getView());
	}

	public function run() {
		return Html::tag('div', '', [
			'class' => 'x-fullscreen-bg J-x-fullscreen-bg ' . $this->addClass,
			'data-path' => $this->path,
			'data-images' => implode('|', $this->images),
		]);
	}

}
