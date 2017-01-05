<?php
/*!
 * yii - asset - weui
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/10/17
 * update: 2017/01/05
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class WeuiAsset extends AssetBundle {

	public $sourcePath = '@bower/weui/dist/style';

	public function init() {
		parent::init();

		$this->css[] = 'weui' . $this->minimal . '.css';
	}

}
