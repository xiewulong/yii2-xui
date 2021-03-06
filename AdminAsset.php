<?php
/*!
 * yii - asset - admin
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

class AdminAsset extends AssetBundle {

	public $sourcePath = '@yii/xui/dist';

	public function init() {
		parent::init();

		$this->css[] = 'css/Admin' . $this->minimal . '.css';
		$this->js[] = 'js/Admin' . $this->minimal . '.js';
	}

}
