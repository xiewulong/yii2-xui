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
	
	public $action;
	
	public $var_name;

	public $toolbars = "'fullscreen','source','|','undo','redo','|','bold','italic','underline','fontborder','strikethrough','superscript','subscript','removeformat','formatmatch','autotypeset','blockquote','pasteplain','|','forecolor','backcolor','insertorderedlist','insertunorderedlist','selectall','cleardoc','|','rowspacingtop','rowspacingbottom','lineheight','|','customstyle','paragraph','fontfamily','fontsize','|','directionalityltr','directionalityrtl','indent','|','justifyleft','justifycenter','justifyright','justifyjustify','|','touppercase','tolowercase','|','link','unlink','anchor','|','imagenone','imageleft','imageright','imagecenter','|','simpleupload','insertimage','emotion','insertvideo','music','map','insertframe','insertcode','pagebreak','template','background','|','horizontal','date','time','spechars','wordimage','|','inserttable','deletetable','insertparagraphbeforetable','insertrow','deleterow','insertcol','deletecol','mergecells','mergeright','mergedown','splittocells','splittorows','splittocols','charts','|','print','preview','searchreplace','help','drafts'";

	public function init(){
		parent::init();

		$id = $this->getRandomId();
		$view = $this->getView();
		UeditorAsset::register($view);
		$js = [];
		if($this->var_name){
			$js[] = "window.$this->var_name=";
		}
		$js[] = "UE.getEditor('$id',{emotionLocalization:true";
		if($this->action){
			$js[] = ",serverUrl:'$this->action'";
		}
		if($this->toolbars){
			$js[] = ",toolbars:[[$this->toolbars]]";
		}
		$js[] = '});';
		$view->registerJs(implode('', $js));
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
