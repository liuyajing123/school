<?php

namespace App\models;

use Common\Model;


CLass NewsModel extends Model
{
	public function getNews()
	{
		$data = $this->table('news')->select();
		return $data;
	}

	public function add($data)
	{
		$re = $this->table('news')->insert($data);
		return $re;
	}

	public function delete($id)
	{
		$re = $this->table('news')->where('news_id',"=",$id)->del();

		if($re){
			return true;
		}else{
			return false;
		}
		
	}

	public function getOne($id)
	{
		$data = $this->table('news')->where('news_id',"=",$id)->get();

		return $data;
	}

	public function update($id,$data)
	{
		unset($data['news_id']);
		$data['addtime'] = time();
		$re = $this->table('news')->where('news_id','=',$id)->savedata($data)->save();

		return $re;
	}
}