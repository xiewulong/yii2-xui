<?php
/*!
 * xui - jquery 2.* Asset
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/9/22
 * update: 2015/9/22
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class Jquery2Asset extends AssetBundle{

	public $sourcePath = '@vendor/xiewulong/www/static/public/js';

	public $js = [
		'jquery.min.js',
	];

}
