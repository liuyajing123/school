<?php

namespace App\controllers;

use Common\Controller;
use App\models\NewsModel;
CLass NewsController extends Controller
{
	public function ActionAdd()
	{
		$this->view('add');
	}

	public function ActionDoadd()
	{
		$data = input();
		$data['addtime'] = time();
		$model = new NewsModel();
		$re = $model->add($data);
		if($re){
			$this->redirect('index/detail');
		}
	}

	public function ActionDel()
	{
		$id = input('news_id');
		$model = new NewsModel();
		$re = $model->delete($id);

		if($re){
			echo  1;
		}else{
			echo  2;
		}
	}

	public function ActionUpdate($id)
	{
		$model = new NewsModel();
		$row = $model->getOne($id);
		$this->view('update',["info"=>$row]);
	}	


	public function ActionDoupdate()
	{
		$id = input('news_id');
		$data = input();
		$model = new NewsModel($id,$data);
		$re = $model->update($id,$data);
		if($re){
			echo "修改成功";
				$this->redirect('index/detail');
		}else{
			//echo "<script>alert('修改失败');location.href=/index/detail;<script>";
		}
	}
}