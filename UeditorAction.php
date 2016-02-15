<?php

namespace yii\xui;

use Yii;
use yii\base\Action;
use yii\helpers\Json;
use yii\imagine\Image;

class UeditorAction extends Action{

	private $config;

	public $fileupload = 'fileupload';

	private $types = [
		'image' => ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'],
	];

	public function init(){
		parent::init();

		$this->config = Json::decode(preg_replace('/(\/\*[\s\S]+?\*\/)|(\s+)/', '', file_get_contents(__DIR__ . '/static/plugins/ueditor/php/config.json')));
		$this->config['imageAllowFiles'] = ['.gif', '.jpg', '.jpeg'];
	}

	public function run($action){
		switch($action){
			case 'config':
				return Json::encode($this->config);
				break;
			case 'uploadimage':
				return $this->saveFile();
				break;
		}
	}

	private function saveFile(){
		$request = \Yii::$app->request;
		$name = 'upfile';
		$min = 0;
		$max = $this->config['imageMaxSize'];
		$type = 'image';
		$sizes = null;
		$oss = 'images';
		$response = ['state' => '没有文件被上传'];

		if(!empty($name) && !empty($_FILES)){
			$_file = $_FILES[$name];
			if(!empty($min) && $_file['size'] < $min){
				$response['state'] = \Yii::t('common', 'File size too small');
			}else if(!empty($max) && $_file['size'] > $max){
				$response['state'] = \Yii::t('common', 'File size too large');
			}else if(!empty($type) && !in_array($_file['type'], $this->types[$type])){
				$response['state'] = \Yii::t('common', 'Please upload the right file type');
			}else{
				$manager = \Yii::createObject(\Yii::$app->components[$this->fileupload]);
				$file = $manager->createFile(array_pop(explode('.', $_file['name'])));
				if(move_uploaded_file($_file['tmp_name'], $file['tmp'])){
					$response['state'] = 'SUCCESS';
					$response['title'] = $_file['name'];
					$response['type'] = $_file['type'];
					$response['size'] = $_file['size'];
					$response['url'] = $response['original'] = $manager->finalFile($file, $oss);
				}
			}
		}

		return Json::encode($response);
	}
	
}