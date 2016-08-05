<?php
/*!
 * xui - admin asset
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/2
 * update: 2016/8/2
 * version: 0.0.2
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class AdminAsset extends AssetBundle {

	public $sourcePath = '@yii/xui/statics';

	public $css = [
		'css/Admin.css',
	];

	public $js = [
		'js/Admin.js',
	];

}
