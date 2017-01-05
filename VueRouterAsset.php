<?php
/*!
 * yii - asset - vue router
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2017/01/03
 * update: 2017/01/06
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class VueRouterAsset extends AssetBundle {

	public $sourcePath = '@bower/vue-router/dist';

	public $deps = [
		'yii\xui\VueAsset',
	];

	public function init() {
		parent::init();

		$this->js[] = 'vue-router' . $this->minimal . '.js';
	}

}
