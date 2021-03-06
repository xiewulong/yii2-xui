<?php
/*!
 * yii - asset - top tips
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/15
 * update: 2016/9/20
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class TopTipsAsset extends AssetBundle {

	public $sourcePath = '@yii/xui/dist';

	public function init() {
		parent::init();

		$this->css[] = 'css/TopTips' . $this->minimal . '.css';
		$this->js[] = 'js/TopTips' . $this->minimal . '.js';
	}

}
