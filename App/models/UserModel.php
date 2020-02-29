<?php
namespace App\models;


use Common\Model;

CLass UserModel extends Model
{
	public function checklogin($username,$pwd)
	{
		$data = $this->table('user')->where('uname','=',$username)->get();
		if($data){
			if($pwd == $data['pwd']){
				return true;
			}else{
				dd("密码错误");
			}
		}else{
			dd("用户名不存在");
		}
	}
}