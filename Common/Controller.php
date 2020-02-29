<?php
namespace Common;


Class Controller 
{
	public $resource;
	public $controller;
	public $action;
	public function __construct($controller,$action)
	{
		$this->controller = $controller;
		$this->action = $action;
		$this->resource = new View($controller,$action);
	}

	public function view($path,$data = [])
	{
		$this->resource->view($path,$data);
	}

	public function redirect($path){
		$path = trim($path,'/');
		$redirect = explode('/', $path);
		$len = count($redirect);
		if($len==1){
			//$url = $this->controller."/".$redirect[0];
			$controller = $this->controller;
			$action = $redirect[0];
		}elseif($len ==2){
			$controller = $redirect[0];
			$action = $redirect[1];
		}else{
			dd("参数错误请检查");
		}

			$controllerName = "App\\controllers\\".ucfirst($controller)."Controller";
			$actionName = "Action".ucfirst($action);
			if(class_exists($controllerName)){
					$obj = new $controllerName($controller,$action);
					//检查类中的方法是不是存在
					if(method_exists($obj, $actionName)){
						//给方法穿参数
						call_user_func_array([$obj,$actionName], []);
					}else{
						dd("方法不存在请检查");
					}
				}else{
					dd("类不存在，请检查");
				}
		//header("location:http://www.school.com/".$url);
	}
}