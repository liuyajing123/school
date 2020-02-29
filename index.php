<?php

//定义一个常量，获取入口文件的位置
define("APP_PATH",__DIR__."/");
//加载配置文件
$config = require "./Config/config.php";
//加载自定义函数文件
require "./Function/functions.php";

//加载框架的核心文件
require "./Vendor/Application.php";
//启动框架
(new Vendor\Application())->run();

