<?php
/*!
 * xui - ueditor widget
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/3/15
 * update: 2015/3/15
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Ueditor extends Widget{

	public $name = null;

	public $value;

	public $id;

	public $id_pre = 'J-x-ueditor-';

	public function init(){
		parent::init();

		$id = $this->getRandomId();
		$view = $this->getView();
		UeditorAsset::register($view);
		$view->registerJs("UE.getEditor('$id')");
	}

	public function run(){
		return Html::textarea($this->name, $this->value, ['id' => $this->getRandomId()]);
	}

	private function getRandomId(){
		if($this->id === null){
			$this->id = $this->id_pre . time() . mt_rand(100, 999);
		}

		return $this->id;
	}

}
