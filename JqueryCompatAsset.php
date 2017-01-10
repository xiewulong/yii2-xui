<?php
/*!
 * yii - asset - jquery compat
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/02/09
 * update: 2017/01/10
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class JqueryCompatAsset extends AssetBundle {

	public $sourcePath = '@bower/jquery-1.11.1/dist';

	public function init() {
		parent::init();

		$this->js[] = 'jquery' . $this->minimal . '.js';
	}

}
