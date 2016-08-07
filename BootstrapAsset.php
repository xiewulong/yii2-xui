<?php
/*!
 * yii - asset - bootstrap
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/9/22
 * update: 2016/8/7
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class BootstrapAsset extends AssetBundle {

	public $sourcePath = '@bower/bootstrap/dist';

	public $css = [
		'css/bootstrap.min.css',
	];

	public $js = [
		'js/bootstrap.min.js',
	];

	public $depends = [
		'yii\xui\JqueryAsset',
	];

}
