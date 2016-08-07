<?php
/*!
 * yii - widget - statistics
 * xiewulong <xiewulong@vip.qq.com>
 * https://github.com/xiewulong/yii2-xui
 * https://raw.githubusercontent.com/xiewulong/yii2-xui/master/LICENSE
 * create: 2016/8/3
 * update: 2016/8/7
 * since: 0.0.2
 */

namespace yii\xui;

use Yii;
use yii\base\Widget;

class Statistics extends Widget {

	public $baidu;

	public $cnzz;

	public $piwik;

	public $env = 'prod';

	public function run() {
		return YII_ENV == $this->env ? $this->render('Statistics', [
			'baidu' => $this->baidu,
			'cnzz' => $this->cnzz,
			'piwik' => $this->piwik,
		]) : null;
	}

}
