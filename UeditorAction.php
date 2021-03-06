<?php
/*!
 * yii - action - ueditor
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2015/3/15
 * update: 2016/8/14
 * since: 0.0.1
 */

namespace yii\xui;

use Yii;
use yii\base\Action;
use yii\helpers\Json;
use yii\imagine\Image;

class UeditorAction extends Action {

	private $config;

	public $fileupload = 'fileupload';

	private $types = [
		'image' => ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'],
	];

	public function init() {
		parent::init();

		$this->config = Json::decode(preg_replace('/(\/\*[\s\S]+?\*\/)|(\s+)/', '', file_get_contents(__DIR__ . '/dist/plugins/ueditor/php/config.json')));
		$this->config['imageAllowFiles'] = ['.gif', '.jpg', '.jpeg', '.png'];
	}

	public function run($action) {
		\Yii::$app->response->format = 'json';
		switch($action) {
			case 'config':
				return $this->config;
				break;
			case 'uploadimage':
				return $this->saveFile();
				break;
		}
	}

	private function saveFile() {
		$request = \Yii::$app->request;
		$name = 'upfile';
		$min = 0;
		$max = $this->config['imageMaxSize'];
		$type = 'image';
		$sizes = null;
		$oss = 'images';
		$response = ['state' => '没有文件被上传'];

		if(!empty($name) && !empty($_FILES)) {
			$_file = $_FILES[$name];
			if(!empty($min) && $_file['size'] < $min) {
				$response['state'] = \Yii::t('common', 'File size too small');
			} else if(!empty($max) && $_file['size'] > $max) {
				$response['state'] = \Yii::t('common', 'File size too large');
			} else if(!empty($type) && !in_array($_file['type'], $this->types[$type])) {
				$response['state'] = \Yii::t('common', 'Please upload the right file type');
			} else {
				$fileupload = \Yii::createObject(\Yii::$app->components[$this->fileupload]);
				$nameList = explode('.', $_file['name']);
				$file = $fileupload->createFile(array_pop($nameList));
				if(move_uploaded_file($_file['tmp_name'], $file['tmp'])) {
					$response['state'] = 'SUCCESS';
					$response['title'] = $_file['name'];
					$response['type'] = $_file['type'];
					$response['size'] = $_file['size'];
					$response['url'] = $response['original'] = $fileupload->finalFile($file, $oss);
				}
			}
		}

		return $response;
	}

}
