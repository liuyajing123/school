<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
         <link rel="stylesheet" href="<?php echo public_path('/css/font.css'); ?>">
       <link rel="stylesheet" href="<?php echo public_path('/css/xadmin.css'); ?>">
        <script type="text/javascript" src="<?php echo public_path('/lib/layui/layui.js'); ?>" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo public_path('/js/xadmin.js'); ?>"></script>
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form" method="post" action="/news/doupdate">
                    <div class="layui-form-item">
                        <label for="L_email" class="layui-form-label">
                            <span class="x-red">*</span>文章标题</label>
                        <div class="layui-input-inline">
                            <input type="hidden" name="news_id" value="<?php echo $info['news_id']; ?>">
                            <input type="text" id="title" name="title" required=""  autocomplete="off" class="layui-input" value="<?php echo $info['title']?>"></div>
                        <div class="layui-form-mid layui-word-aux">
                            <span class="x-red">*</span>请输入文章标题</div>
                    <div class="layui-form-item">
                        <label for="author" class="layui-form-label">
                            <span class="x-red">*</span>作者</label>
                        <div class="layui-input-inline">
                            <input type="text" id="author" name="author" required=""  autocomplete="off" class="layui-input" value="<?php echo $info['author']?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_pass" class="layui-form-label">
                            <span class="x-red">*</span>简介</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_pass" name="des" required="" autocomplete="off" class="layui-input" value="<?php echo $info['des']?>"></div></div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                            <span class="x-red">*</span>内容</label>
                        <div class="layui-input-inline">
                            <textarea id="L_repass" name="content" required=""  autocomplete="off" class="layui-input" ><?php echo $info['content']; ?></textarea>
                    </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <input value="修改" lay-submit lay-filter="login" style="width:100%;" type="submit" class="layui-btn">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>