<?php
/*!
 * yii - asset - bootstrap plugin
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2017/1/5
 * update: 2017/1/6
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class BootstrapPluginAsset extends AssetBundle {

	public $sourcePath = '@npm/bootstrap/dist';

	public $depends = [
		'yii\xui\BootstrapCssAsset',
		'yii\xui\JqueryAsset',
		'yii\xui\TetherAsset',
	];

	public function init() {
		parent::init();

		$this->js[] = 'js/bootstrap' . $this->minimal . '.js';
	}

}
