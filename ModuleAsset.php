<?php
/*!
 * yii - asset - module
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/2
 * update: 2016/8/7
 * since: 0.0.2
 */

namespace yii\xui;

use Yii;
use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle {

	public $distPath = 'dist';

	public function init() {
		parent::init();

		$filename = \Yii::$app->controller->module->id . '.' . \Yii::$app->controller->id;
		$this->css[] = 'css/' . \Yii::$app->controller->module->id . '.css';
		$this->css[] = 'css/' . $filename . '.css';
		$this->js[] = 'js/' . \Yii::$app->controller->module->id . '.js';
		$this->js[] = 'js/' . $filename . '.js';

		$this->sourcePath = \Yii::$app->controller->module->basePath . DIRECTORY_SEPARATOR . $this->distPath;
	}

}
