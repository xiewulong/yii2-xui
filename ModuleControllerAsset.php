<?php
/*!
 * yii - asset - module.controller
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/16
 * update: 2016/9/5
 * since: 0.0.2
 */

namespace yii\xui;

use Yii;

class ModuleControllerAsset extends ModuleAsset {

	public function init() {
		parent::init();

		$namespace = $this->namespace ? : \Yii::$app->controller->module->id;
		$filename = $namespace . '.' . \Yii::$app->controller->id;
		$this->css[] = 'css/' . $filename . $this->minimal . '.css';
		$this->js[] = 'js/' . $filename . '.js';
	}

}
