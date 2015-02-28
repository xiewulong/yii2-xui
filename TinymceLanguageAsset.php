<?php
/*!
 * xui - tinymce
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/28
 * update: 2015/2/28
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class TinymceLanguageAsset extends AssetBundle{

	public $sourcePath = '@yii/xui/static';

	public $js = [
		'js/tinymce.language.zh_CN.js',
	];

	public $depends = [
		'yii\xui\TinymceAsset',
	];

}
