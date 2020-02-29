<?php

namespace App\models;

use Common\Model;

CLass IndexModel extends Model
{
	public function getinfo()
	{
		
		$re = $this->Col(['u_id','uname'])->table('user')->where('u_id',">",1)->select();
		//$re = $this->table('user')->where("u_id","=",1)->del();

		return $re;
	}
}