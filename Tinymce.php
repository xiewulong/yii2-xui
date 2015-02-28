<?php
/*!
 * xui - tinymce widget
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/28
 * update: 2015/2/28
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Tinymce extends Widget{

	public $name = null;

	public $value;

	public $id;

	public $id_pre = 'J-x-tinymce-';

	public $plugins = 'advlist anchor autolink autoresize autosave bbcode charmap code colorpicker contextmenu directionality emoticons fullpage fullscreen hr image insertdatetime layer legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace tabfocus table template textcolor textpattern visualblocks visualchars wordcount'; //'importcss spellchecker'

	public function init(){
		parent::init();

		$id = $this->getRandomId();
		$view = $this->getView();
		TinymceAsset::register($view);
		TinymceLanguageAsset::register($view);
		$view->registerJs("tinymce.init({selector:'#$id',plugins:'$this->plugins',autosave_ask_before_unload:false,preview_styles:false});");
	}

	public function run(){
		return Html::textarea($this->name, $this->value, ['id' => $this->getRandomId()]);
	}

	private function getRandomId(){
		if($this->id === null){
			$this->id = $this->id_pre . time() . mt_rand(1000, 9999);
		}

		return $this->id;
	}

}
