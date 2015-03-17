<?php

namespace yii\xui;

use Yii;
use yii\base\Action;
use yii\helpers\Json;
use yii\imagine\Image;

class UeditorAction extends Action{

	private $types = [
		'image' => ['image/gif', 'image/jpeg', 'image/pjpeg'],
	];

	public function run($action){
		switch($action){
			case 'config':
				return preg_replace('/(\/\*[\s\S]+?\*\/)|(\s+)/', '', file_get_contents(__DIR__ . '/static/plugins/ueditor/php/config.json'));
				break;
			case 'uploadimage':
			case 'uploadscrawl':
			case 'uploadvideo':
			case 'uploadfile':
				return true;
				break;
		}
	}
	
}