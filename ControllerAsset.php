<?php
/*!
 * yii - asset - controller
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/2
 * update: 2016/9/20
 * since: 0.0.2
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class ControllerAsset extends AssetBundle {

	public $basePath = '@webroot';

	public $baseUrl = '@web';

	public function init() {
		parent::init();

		$filename = \Yii::$app->controller->id;
		$this->css[] = 'css/' . $filename . $this->minimal . '.css';
		$this->js[] = 'js/' . $filename . $this->minimal . '.js';
	}

}
