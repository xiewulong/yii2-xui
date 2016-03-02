<?php
/*!
 * xui - ueditor widget
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/3/15
 * update: 2016/3/2
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Ueditor extends Widget {

	public $name = null;

	public $value;

	public $id;

	public $id_pre = 'J-x-ueditor-';
	
	public $action;
	
	public $var_name;
	
	public $options = [];

	private $stringOptions = ['UEDITOR_HOME_URL', 'serverUrl', 'lang', 'langPath', 'theme', 'themePath', 'charset', 'textarea', 'initialContent', 'initialStyle', 'iframeCssUrl', 'indentValue', 'listiconpath', 'wordCountMsg', 'wordOverFlowMsg', 'tabNode', 'removeFormatTags', 'removeFormatAttributes', 'pageBreakTag', 'sourceEditor', 'codeMirrorJsUrl', 'codeMirrorCssUrl', 'webAppKey'];

	private $defaultToolbars = "'fullscreen','source','|','undo','redo','|','bold','italic','underline','fontborder','strikethrough','superscript','subscript','removeformat','formatmatch','autotypeset','blockquote','pasteplain','|','forecolor','backcolor','insertorderedlist','insertunorderedlist','selectall','cleardoc','|','rowspacingtop','rowspacingbottom','lineheight','|','customstyle','paragraph','fontfamily','fontsize','|','directionalityltr','directionalityrtl','indent','|','justifyleft','justifycenter','justifyright','justifyjustify','|','touppercase','tolowercase','|','link','unlink','anchor','|','imagenone','imageleft','imageright','imagecenter','|','simpleupload','insertimage','emotion','insertvideo','music','map','insertframe','insertcode','pagebreak','template','background','|','horizontal','date','time','spechars','wordimage','|','inserttable','deletetable','insertparagraphbeforetable','insertrow','deleterow','insertcol','deletecol','mergecells','mergeright','mergedown','splittocells','splittorows','splittocols','charts','|','print','preview','searchreplace','help','drafts'";

	public function init() {
		parent::init();

		$id = $this->getRandomId();
		$view = $this->getView();
		UeditorAsset::register($view);
		$view->registerJs("window.$this->var_name=UE.getEditor('$id',{emotionLocalization:true" . $this->getOptionString() . "});");
	}

	public function run() {
		return Html::textarea($this->name, $this->value, ['id' => $this->getRandomId()]);
	}

	private function getOptionString() {
		if(!isset($this->options['action'])) {
			$this->options['serverUrl'] = $this->action;
		}
		if(!isset($this->options['toolbars'])) {
			$this->options['toolbars'] = "[[$this->defaultToolbars]]";
		}

		$options = [];
		foreach($this->options as $k => $v) {
			$isString = in_array($k, ['', '']);
			$options[] = ",$k:" . (in_array($k, $this->stringOptions) ? "'$v'" : $v);
		}

		return implode('', $options);
	}

	private function getRandomId() {
		if($this->id === null) {
			$this->id = $this->id_pre . time() . mt_rand(100, 999);
		}

		return $this->id;
	}

}
