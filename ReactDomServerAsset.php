<?php
/*!
 * yii - asset - react dom server
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/10/14
 * update: 2016/10/14
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class ReactDomServerAsset extends AssetBundle {

	public $sourcePath = '@bower/react';

	public $depends = [
		'yii\xui\ReactAsset',
	];

	public function init() {
		parent::init();

		$this->js[] = 'js/react-dom-server' . $this->minimal . '.js';
	}

}
