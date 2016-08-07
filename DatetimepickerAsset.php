<?php
/*!
 * yii - asset - date time picker
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/23
 * update: 2016/8/7
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class DatetimepickerAsset extends AssetBundle {

	public $sourcePath = '@bower/smalot-bootstrap-datetimepicker';

	public $css = [
		'css/bootstrap-datetimepicker.min.css',
	];

	public $js = [
		'js/bootstrap-datetimepicker.min.js',
	];

	public $depends = [
		'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

	public function addLanguage($language) {
		$this->js[] = 'js/locales/bootstrap-datetimepicker.' . $language . '.js';
	}

}
