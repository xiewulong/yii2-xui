<?php
/*!
 * yii - asset - flux
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/10/17
 * update: 2016/10/17
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class FluxAsset extends AssetBundle {

	public $sourcePath = '@bower/flux/dist';

	public function init() {
		parent::init();

		$this->js[] = 'Flux' . $this->minimal . '.js';
	}

}
