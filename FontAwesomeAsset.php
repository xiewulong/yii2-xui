<?php
/*!
 * yii - asset - font awesome
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/9/22
 * update: 2016/9/5
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class FontAwesomeAsset extends AssetBundle {

	public $sourcePath = '@bower/font-awesome';

	public function init() {
		parent::init();

		$this->css[] = 'css/font-awesome' . $this->minimal . '.css';
	}

}
