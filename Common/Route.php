<?php

namespace Common;

CLass Route
{
	//重写模式的路由规则
	public static function Rewrite($url,$script)
	{
		$url = str_replace($script, '', $url);
		$uri = trim($url,'/');
		$route = explode('/', $uri);
		$len = count($route);
		if($len<=2){
				$controller = $route[0]?$route[0]:config("DefaultController");
				$action = $route[1]?$route[1]:config("DefaultAction");
				$params = [];
			}else{
				$controller = $route[0];
				$action = $route[1];
				unset($route[0]);
				unset($route[1]);
				foreach ($route as $key => $value) {
				if($key%2==0){
					$params[$route[$key]] = $route[$key+1];
				}else{
					continue;
				}	
			}
		}
		
		return ['controller'=>$controller,'action'=>$action,"params"=>$params];
	}
}