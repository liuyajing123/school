<?php

namespace Common;

Class View
{
	public $controller;
	public $action;
	public function __construct($controller,$action)
	{
		$this->controller = $controller;
		$this->action  = $action;
	}
	public function view($path,$data)
	{
		extract($data);
		if(empty($path)){
			$filename = APP_PATH."App\\views\\".$this->controller."\\".$this->action.".php";

			if(file_exists($filename)){
				include $filename;
			}else{
				dd("资源不存在，请检查");
			}
		}else{
			$path = trim($path,'/');
			$urls = explode('/', $path);
			$len = count($urls);
			if($len ==1){
				$filename = APP_PATH."App\\views\\".$this->controller."\\".$urls[0].".php";

			if(file_exists($filename)){
				include $filename;
			}else{
				dd("资源不存在，请检查");
			}
			}elseif($len==2){
				$filename = APP_PATH."App\\views\\".$urls[0]."\\".$urls[1].".php";

			if(file_exists($filename)){
				include $filename;
			}else{
				dd("资源不存在，请检查");
			}
			}else{
				dd("参数错误，请检查");
			}
		}
	}
}