<?php
/*!
 * yii - asset - bootstrap date and time picker
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/23
 * update: 2017/1/6
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class BootstrapDatetimepickerAsset extends AssetBundle {

	public $sourcePath = '@bower/smalot-bootstrap-datetimepicker';

	public $depends = [
		'yii\xui\BootstrapAsset',
	];

	public function init() {
		parent::init();

		$this->css[] = 'css/bootstrap-datetimepicker' . $this->minimal . '.css';
		$this->js[] = 'js/bootstrap-datetimepicker' . $this->minimal . '.js';
	}

	public function addLanguage($language) {
		$this->js[] = 'js/locales/bootstrap-datetimepicker.' . $language . '.js';
	}

}
