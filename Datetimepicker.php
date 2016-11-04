<?php
/*!
 * yii - widget - date time picker
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/1/23
 * update: 2016/11/4
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Datetimepicker extends Widget {

	public $name;

	public $value;

	public $placeholder;

	public $addClass;

	public $advanced = false;

	public $format = 'yyyy-mm-dd';	//'yyyy-mm-dd hh:ii:ss'

	public $startView = 2;	//0'hour', 1'day', 2'month', 3'year', 4'decade'

	public $minView = 2;	//0'hour', 1'day', 2'month', 3'year', 4'decade'

	public $maxView = 4;	//0'hour', 1'day', 2'month', 3'year', 4'decade'

	public $todayHighlight = 1;

	public $autoclose = 1;

	public $todayBtn = 1;

	public $minuteStep = 5;

	public $pickerPosition = 'bottom-right';

	public $id;

	public $id_pre = 'J-x-datetimepicker-';

	public $language = 'zh-CN';

	public $inputId;

	public $startDate;

	public $endDate;

	public function init() {
		parent::init();

		$id = $this->getRandomId();
		$view = $this->getView();
		DatetimepickerAsset::register($view)->addLanguage($this->language);
		$js = "$('#$id').datetimepicker({'format':'$this->format','autoclose':$this->autoclose,'todayBtn':$this->todayBtn,'minuteStep':$this->minuteStep,'pickerPosition':'$this->pickerPosition','todayHighlight':$this->todayHighlight,'language':'$this->language','startView':$this->startView,'minView':$this->minView,'maxView':$this->maxView";
		if($this->startDate) {
			$js .= ",'startDate':$this->startDate";
		}
		if($this->endDate) {
			$js .= ",'endDate':$this->endDate";
		}
		$js .= "});";
		$view->registerJs($js, 3);
	}

	public function run() {
		return $this->getHtml();
	}

	private function getHtml() {
		$id = $this->getRandomId();
		$html = '';
		if($this->advanced) {
			$html = Html::tag('div', $this->getAdvancedContent(), [
				'id' => $id,
				'class' => 'input-group date ' . $this->addClass,
			]);
		} else {
			$html = Html::input('text', $this->name, $this->value, [
				'id' => $id,
				'class' => 'form-control ' . $this->addClass,
				'placeholder' => $this->placeholder,
			]);
		}

		return $html;
	}

	private function getAdvancedContent() {
		return Html::tag('div', Html::tag('i', '', ['class' => 'glyphicon glyphicon-calendar']), ['class' => 'input-group-addon']) . Html::input('text', $this->name, $this->value, ['class' => 'form-control', 'placeholder' => $this->placeholder, 'id' => $this->inputId]);
	}

	private function getRandomId() {
		if($this->id === null) {
			$this->id = $this->id_pre . time() . mt_rand(1000, 9999);
		}

		return $this->id;
	}

}
