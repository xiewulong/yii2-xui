<?php
/*!
 * yii - asset - jqueryX
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/7
 * update: 2016/9/5
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class JqueryXAsset extends AssetBundle {

	public $sourcePath = '@xiewulong/jqueryx/dist';

	public $depends = [
		'yii\xui\JqueryCompatAsset',
	];

	public function init() {
		parent::init();

		$this->js[] = 'jquery.x' . $this->minimal . '.js';
	}

}
