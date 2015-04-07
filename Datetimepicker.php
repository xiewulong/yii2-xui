<?php
/*!
 * xui - date time picker widget
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/23
 * update: 2015/4/7
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

	public $format = 'yyyy-mm-dd';

	public $startView = 'month';	//'decade', 'year', 'month', 'day', 'hour'

	public $minView = 'month';	//'decade', 'year', 'month', 'day', 'hour'

	public $maxView = 'decade';	//'decade', 'year', 'month', 'day', 'hour'

	public $viewSelect = 'month';	//'decade', 'year', 'month', 'day', 'hour'

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

		$id = $this->getRandomId();
		$view = $this->getView();
		DatetimepickerAsset::register($view)->addLanguage($this->language);
		$view->registerJs("$('#$id').datetimepicker({'format':'$this->format','autoclose':$this->autoclose,'todayBtn':$this->todayBtn,'minuteStep':$this->minuteStep,'pickerPosition':'$this->pickerPosition','todayHighlight':$this->todayHighlight,'language':'$this->language','startView':'$this->startView','minView':'$this->minView','maxView':'$this->maxView','viewSelect':'$this->viewSelect'});");
	}

	public function run(){
		return $this->getHtml();
	}

	private function getHtml(){
		$id = $this->getRandomId();
		$html = '';
		if($this->advanced){
			$html = Html::tag('div', $this->getAdvancedContent(), [
				'id' => $id,
				'class' => 'input-group date ' . $this->addClass,
			]);
		}else{
			$html = Html::input('text', $this->name, $this->value, [
				'id' => $id,
				'class' => 'form-control ' . $this->addClass,
				'placeholder' => $this->placeholder,
			]);
		}

		return $html;
	}

	private function getAdvancedContent(){
		return Html::tag('div', Html::tag('i', '', ['class' => 'glyphicon glyphicon-calendar']), ['class' => 'input-group-addon']) . Html::input('text', $this->name, $this->value, ['class' => 'form-control', 'placeholder' => $this->placeholder]);
	}

	private function getRandomId(){
		if($this->id === null){
			$this->id = $this->id_pre . time() . mt_rand(1000, 9999);
		}

		return $this->id;
	}

}
