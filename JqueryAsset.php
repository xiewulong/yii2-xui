<?php
/*!
 * yii - asset - jquery
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

class JqueryAsset extends AssetBundle {

	public $sourcePath = '@bower/jquery/dist';

	public $js = [
		'jquery.min.js',
	];

}
