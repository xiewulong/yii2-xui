<?php
/*!
 * yii - asset - fullscreen background
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/13
 * update: 2016/9/20
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class FullscreenBackgroundAsset extends AssetBundle {

	public $sourcePath = '@yii/xui/dist';

	public $depends = [
		'yii\xui\JqueryAsset',
	];

	public function init() {
		parent::init();

		$this->css[] = 'css/FullscreenBackground' . $this->minimal . '.css';
		$this->js[] = 'js/FullscreenBackground' . $this->minimal . '.js';
	}

}
