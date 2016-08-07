<?php
/*!
 * yii - asset - top tips
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/15
 * update: 2016/8/7
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class TopTipsAsset extends AssetBundle {

	public $sourcePath = '@yii/xui/dist';

	public $css = [
		'css/TopTips.css',
	];

	public $js = [
		'js/TopTips.js',
	];

}
