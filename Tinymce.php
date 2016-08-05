<?php
/*!
 * xui - tinymce widget
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/2/28
 * update: 2016/8/2
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Tinymce extends Widget) {

	public $name = null;

	public $value;

	public $id;

	public $id_pre = 'J-x-tinymce-';

	public $addPlugins;

	public $removePlugins;

	public $plugins = 'advlist anchor autolink autoresize autosave bbcode charmap code colorpicker contextmenu directionality emoticons fullscreen hr image insertdatetime layer legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace tabfocus table template textcolor textpattern visualblocks visualchars wordcount';	//'fullpage importcss spellchecker'

	public $font_formats = 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats;';

	public $fontsize_formats = '12px 14px 16px 18px 20px 22px 24px 26px 28px 30px';

	public $toolbar = 'insertfile undo redo | styleselect formatselect fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image';	//newdocument strikethrough cut copy paste blockquote removeformat subscript superscript

	public function init(){
		parent::init();

		$id = $this->getRandomId();
		$view = $this->getView();
		TinymceAsset::register($view);
		TinymceLanguageAsset::register($view);
		$view->registerJs("tinymce.init({selector:'#$id',plugins:'$this->plugins',font_formats:'$this->font_formats',fontsize_formats:'$this->fontsize_formats',autosave_ask_before_unload:false,preview_styles:false,toolbar:'$this->toolbar'});");
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
