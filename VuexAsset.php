<?php
/*!
 * yii - asset - vuex
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2017/01/03
 * update: 2017/01/03
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class VuexAsset extends AssetBundle {

	public $sourcePath = '@npm/vuex/dist';

	public $deps = [
		'yii\xui\VueAsset',
	];

	public function init() {
		parent::init();

		$this->js[] = 'vuex' . $this->minimal . '.js';
	}

}
