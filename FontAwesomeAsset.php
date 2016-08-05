<?php
/*!
 * xui - font awesome Asset
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/9/22
 * update: 2016/8/2
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle {

	public $sourcePath = '@bower/font-awesome';

	public $css = [
		'css/font-awesome.min.css',
	];

}
