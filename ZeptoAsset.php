<?php
/*!
 * yii - asset - zepto
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/9/28
 * update: 2016/9/28
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class ZeptoAsset extends AssetBundle {

	public $sourcePath = '@bower/zeptojs/src';

	public function init() {
		parent::init();

		// $this->js[] = 'zepto' . $this->minimal . '.js';
		$this->js[] = 'zepto.js';
	}

}
