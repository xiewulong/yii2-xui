<?php
/*!
 * xui - jqueryX Asset
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/7
 * update: 2015/2/7
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class JqueryXAsset extends AssetBundle{

	public $sourcePath = '@xiewulong/jqueryX/dist';

	public $js = [
		'jquery.x.min.js',
	];

	public $depends = [
		'yii\xui\WwwAsset',
	];

}
