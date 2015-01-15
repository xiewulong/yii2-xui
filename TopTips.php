<?php
/*!
 * xui - top tips widget
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

class TopTips extends Widget{

	public $addClass;

	public $types = [
		'success' => 'x-tips-success',
		'error' => 'x-tips-error',
	];

	public function init(){
		parent::init();

		TopTipsAsset::register($this->getView());
	}

	public function run(){
		$class = 'x-tips J-x-tips ' . $this->addClass;

		$tips = '';
		foreach(Yii::$app->session->getAllFlashes() as $type => $message){
			if(array_key_exists($type, $this->types)){
				$tips .= Html::tag('div', Html::tag('p', Html::encode($message)), ['class' => $class . ' ' . $this->types[$type]]);
			}
		}

		return $tips;
	}

}
