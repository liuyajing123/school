<?php



function dd($value)
{
	if(is_array($value)){
		print_r($value);die;
	}elseif(is_string($value)){
		echo $value;die;
	}else{
		var_dump($value);die;
	}
}

function config($key=null)
{
	$config = require "./Config/config.php";
	if(is_null($key)){
		return $config;
	}else{
		return $config[$key];
	}
}

function public_path($path)
{
	$server = $_SERVER['SERVER_NAME'];
	$url = "http://".$server."/Public".$path;

	return $url;
}

function input($keys = null)
{
		$data = $_POST;
	if(is_null($keys)){
		return $data;
	}

	//dd($data);
	$new_data = [];
	foreach ($data as $key => $value) {
		$new_value = htmlspecialchars($value);
		$new_data[$key] = $new_value;
	}

	return $new_data[$keys];
}