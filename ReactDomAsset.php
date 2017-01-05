<?php
/*!
 * yii - asset - react dom
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/10/14
 * update: 2017/1/5
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class ReactDomAsset extends AssetBundle {

	public $sourcePath = '@npm/react';

	public $depends = [
		'yii\xui\ReactAsset',
	];

	public function init() {
		parent::init();

		$this->js[] = 'react-dom' . $this->minimal . '.js';
	}

}
