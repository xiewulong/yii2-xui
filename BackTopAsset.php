<?php
/*!
 * xui - back top asset
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/15
 * update: 2015/1/15
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class BackTopAsset extends AssetBundle{

	public $sourcePath = '@yii/xui/static';

	public $css = [
		'css/BackTop.css',
	];

	public $js = [
		'js/BackTop.js',
	];

	public $depends = [
		'yii\xui\JqueryAsset',
	];

}
