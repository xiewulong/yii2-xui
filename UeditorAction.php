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
				return true;
				break;
		}
		$request = \Yii::$app->request;
		$name = $request->post('name');
		$min = $request->post('min');
		$max = $request->post('max');
		$type = $request->post('type');
		$sizes = $request->post('sizes');
		$oss = $request->post('oss', 'images');
		$response = ['status' => 0, 'message' => \Yii::t('common', 'File upload failed') . ', ' . \Yii::t('common', 'Please try again')];

		if(!empty($name) && !empty($_FILES)){
			$_file = $_FILES[$name];
			if(!empty($min) && $_file['size'] < $min){
				$response['message'] = \Yii::t('common', 'File size too small');
			}else if(!empty($max) && $_file['size'] > $max){
				$response['message'] = \Yii::t('common', 'File size too large');
			}else if(!empty($type) && !in_array($_file['type'], $this->types[$type])){
				$response['message'] = \Yii::t('common', 'Please upload the right file type');
			}else{
				$manager = \Yii::$app->fileupload;
				$ossActive = isset($manager->oss[$oss]);
				$file = $manager->createFile(array_pop(explode('.', $_file['name'])));
				if(move_uploaded_file($_file['tmp_name'], $file['tmp'])){
					$response['status'] = 1;
					$response['message'] = \Yii::t('common', 'File upload successful');
					$response['data'] = ['original' => $manager->finalFile($file, $oss)];
					if(!empty($sizes)){
						foreach(explode('|', $sizes) as $size){
							$_size = explode('x', $size);
							if(count($_size) != 2)continue;
							$thumbnail = $manager->addSuf($file, $_size);
							Image::thumbnail($file['tmp'], $_size[0], $_size[1], 'inset')->save($thumbnail['tmp']);
							$response['data']['t' . $size] = $manager->finalFile($thumbnail, $oss);
							if($ossActive){
								unlink($thumbnail['tmp']);
							}
						}
					}
					if($ossActive){
						unlink($file['tmp']);
					}
				}
			}
		}

		return '<script type="text/javascript">parent.' . $name . '(' . Json::encode($response) . ');</script>';
	}
	
}