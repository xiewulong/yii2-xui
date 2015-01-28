<?php
/*!
 * xui - date time picker widget
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/23
 * update: 2015/1/23
 * version: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Datetimepicker extends Widget{

	public $name;

	public $value;

	public $placeholder;

	public $addClass;

	public $advanced = false;

	public $format = 'yyyy-mm-dd hh:ii:ss';

	public $todayHighlight = 1;

	public $autoclose = 1;

	public $todayBtn = 1;

	public $minuteStep = 5;

	public $pickerPosition = 'bottom-right';

	public $id;

	public $id_pre = 'J-x-datetimepicker-';

	public $language = 'zh-CN';

	public function init(){
		parent::init();

		$id = $this->getDatetimepickerId();
		$view = $this->getView();
		DatetimepickerAsset::register($view)->addLanguage($this->language);
		$view->registerJs("$('#$id').datetimepicker({'format':'$this->format','autoclose':$this->autoclose,'todayBtn':$this->todayBtn,'minuteStep':$this->minuteStep,'pickerPosition':'$this->pickerPosition','todayHighlight':$this->todayHighlight,'language':'$this->language'});");
	}

	public function run(){
		return $this->getHtml();
	}

	private function getHtml(){
		$id = $this->getDatetimepickerId();
		$html = '';
		if($this->advanced){
			$html = Html::tag('div', $this->getAdvancedContent(), [
				'id' => $id,
				'class' => 'input-group date',
			]);
		}else{
			$html = Html::input('text', $this->name, $this->value, [
				'id' => $id,
				'class' => 'form-control',
				'placeholder' => $this->placeholder,
			]);
		}

		return $html;
	}

	private function getAdvancedContent(){
		return Html::tag('div', Html::tag('i', '', ['class' => 'glyphicon glyphicon-calendar']), ['class' => 'input-group-addon']) . Html::input('text', $this->name, $this->value, ['class' => 'form-control', 'placeholder' => $this->placeholder]);
	}

	private function getDatetimepickerId(){
		if($this->id === null){
			$this->id = $this->id_pre . time() . mt_rand(1000, 9999);
		}

		return $this->id;
	}

}
