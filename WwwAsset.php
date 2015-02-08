<?php
/*!
 * xui - jquery Asset
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/9
 * update: 2015/2/9
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class WwwAsset extends AssetBundle{

	public $sourcePath = '@xiewulong/www/static/public';

	public $css = [
		'css/public.css',
	];

	public $depends = [
		'xiewulong/JqueryXAsset',
	];

}
