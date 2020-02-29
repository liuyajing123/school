<?php

namespace Vendor;

use Common\Route;
Class Application
{
	//启动框架
	public function run()
	{
		session_start();
		//自动加载
		spl_autoload_register([$this,'autoload']);
		//路由

		$this->route();
	  
	}

	//路由方法 获取对应的控制器和方法
	public function route()
	{
		  /*
			http://www.school.com/index/index  重写模式 所有框架都支持 不带问号
			http://www.school.com?c=index&a=index pathinfo模式 tp3.2 CI 友好支持
			http://www.school.com?r=index/index 兼容模式  yii2.0用的这种模式
	    */

			$query = $_SERVER["QUERY_STRING"];
			$uri = $_SERVER["REQUEST_URI"];
			$script = $_SERVER['SCRIPT_NAME'];
			if(empty($query)){
				
				$re = Route::Rewrite($uri,$script);
			}else{
				dd("请求不合法，请检查你的请求地址");
			}
			$controllerName = "App\\controllers\\".ucfirst($re['controller'])."Controller";
			$actionName = "Action".ucfirst($re['action']);
			//检查类是不是存在
			if(class_exists($controllerName)){
				$obj = new $controllerName($re['controller'],$re['action']);
				//检查类中的方法是不是存在
				if(method_exists($obj, $actionName)){
					//给方法穿参数
					call_user_func_array([$obj,$actionName],$re['params']);
				}else{
					dd("方法不存在请检查");
				}
			}else{
				dd("类不存在，请检查");
			}
	}



	//自动加载的实现

	private function autoload($class)
	{
		$filename = APP_PATH.$class.".php";
		if(file_exists($filename)){
			include $filename;
		}else{
			dd("文件不存在，请检查"); 
		}
	}
}