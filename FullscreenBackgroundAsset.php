<?php
/*!
 * yii - asset - fullscreen background
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/13
 * update: 2016/8/7
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class FullscreenBackgroundAsset extends AssetBundle {

	public $sourcePath = '@yii/xui/dist';

	public $css = [
		'css/FullscreenBackground.css',
	];

	public $js = [
		'js/FullscreenBackground.js',
	];

	public $depends = [
		'yii\xui\JqueryAsset',
	];

}
