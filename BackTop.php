<?php
/*!
 * xui - back top widget
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/15
 * update: 2015/1/15
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class BackTop extends Widget{

	public $addClass;

	public $content;

	public function init(){
		parent::init();

		BackTopAsset::register($this->getView());
	}

	public function run(){
		return Html::tag('div', $this->content, [
			'class' => 'x-backtop J-x-backtop ' . $this->addClass,
		]);
	}

}
