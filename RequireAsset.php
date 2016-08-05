<?php
/*!
 * xui - jquery Asset
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/9
 * update: 2016/8/2
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class RequireAsset extends AssetBundle {

	public $sourcePath = '@xiewulong/samples/static/public';

	public $js = [
		'js/require.js',
	];

}
