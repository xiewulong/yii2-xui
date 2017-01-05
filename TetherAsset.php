<?php
/*!
 * yii - asset - tether
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2017/1/6
 * update: 2017/1/6
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class TetherAsset extends AssetBundle {

	public $sourcePath = '@bower/tether/dist';

	public function init() {
		parent::init();

		$this->js[] = 'js/tether' . $this->minimal . '.js';
	}

}
