<?php
/*!
 * yii - asset - tinymce
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/28
 * update: 2016/9/5
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class TinymceAsset extends AssetBundle {

	public $sourcePath = '@vendor/tinymce/tinymce';

	public function init() {
		parent::init();

		$this->js[] = 'tinymce' . $this->minimal . '.js';
	}

}
