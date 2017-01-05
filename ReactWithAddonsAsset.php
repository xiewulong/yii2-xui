<?php
/*!
 * yii - asset - react with addons
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/10/30
 * update: 2017/1/5
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class ReactWithAddonsAsset extends AssetBundle {

	public $sourcePath = '@npm/react';

	public function init() {
		parent::init();

		$this->js[] = 'react-with-addons' . $this->minimal . '.js';
	}

}
