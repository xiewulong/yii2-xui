<?php
/*!
 * yii - asset - bootstrap
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/9/22
 * update: 2016/9/5
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class BootstrapAsset extends AssetBundle {

	public $depends = [
		'yii\xui\BootstrapCssAsset',
		'yii\xui\BootstrapPluginAsset',
	];

}
