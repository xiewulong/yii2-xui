<?php
/*!
 * yii - asset - ueditor
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/3/15
 * update: 2016/9/5
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\components\AssetBundle;

class UeditorAsset extends AssetBundle {

	public $sourcePath = '@yii/xui/dist/plugins/ueditor';

	public $js = [
		'ueditor.config.js',
	];

	public function init() {
		parent::init();

		$this->js[] = 'ueditor.all' . $this->minimal . '.js';
	}

}
