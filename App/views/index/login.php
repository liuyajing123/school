<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>school-Login</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="<?php echo public_path('/css/font.css'); ?>">
    <link rel="stylesheet" href="<?php echo public_path('/css/login.css'); ?>">
	  <link rel="stylesheet" href=".<?php echo public_path('/css/xadmin.css'); ?>">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo public_path('/lib/layui/layui.js'); ?>" charset="utf-8"></script>
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">school-Login</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" action="/user/login">
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="verify" placeholder="验证码"  type="text" lay-verify="required" class="layui-input" >
            <image src="/index/code" onclick="changecode()" id="code"/>
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>
    <script type="text/javascript">
      function changecode()
      {
          var code = $("#code");
          code.attr("src","/index/code/"+Math.random());
      }
    </script>
</body>
</html>