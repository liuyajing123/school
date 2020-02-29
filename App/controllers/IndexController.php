<?php

namespace App\controllers;

use App\models\IndexModel;
use Vendor\Tools\VerifyCode;
use Common\Controller;
use App\models\NewsModel;

CLass IndexController extends Controller
{
	public function ActionIndex()
	{
		$this->view('login');
	}
	public function ActionDetail()
	{
		$model = new NewsModel();
		$data  = $model->getNews();

		$this->view('index/newslist',['data'=>$data]);

	}

	public function ActionCode()
	{
		$code = new VerifyCode();
		$_SESSION['code']= $code->getCode();
		$image = $code->outImage();
		return $image;
	}
}