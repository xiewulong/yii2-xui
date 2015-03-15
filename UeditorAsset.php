<?php
/*!
 * xui - ueditor
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/3/15
 * update: 2015/3/15
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class UeditorAsset extends AssetBundle{

	public $sourcePath = '@yii/xui/static/plugins/ueditor';

	public $js = [
		'ueditor.config.js',
		'ueditor.all.min.js',
	];

}
