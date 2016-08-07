<?php
/*!
 * yii - asset - jquery compat
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/9
 * update: 2016/8/7
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class JqueryCompatAsset extends AssetBundle {

	public $sourcePath = '@yii/xui/dist';

	public $js = [
		'js/jquery.min.js',
	];

}
