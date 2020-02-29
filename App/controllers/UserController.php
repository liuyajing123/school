<?php
namespace App\controllers;

use Common\Controller;
use App\models\UserModel;
Class UserController extends Controller
{

	public function ActionLogin()
	{
		$code = $_SESSION['code'];
		$verify = input("verify");
		if($code != $verify){
			dd("验证码错误");
		}
		$model = new UserModel();
		$username = input('username');
		$pwd = input('password');

		$re = $model->checklogin($username,$pwd);

		if($re){
			$this->redirect('index/detail');
		}
		

	}
}