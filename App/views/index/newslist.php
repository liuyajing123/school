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
        <script src="<?php echo public_path('/lib/layui/layui.js'); ?>" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo public_path('/js/xadmin.js'); ?>"></script>
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <a class="layui-btn" href="/news/add"><i class="layui-icon"></i>添加</a>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>作者</th>
                                    <th>简介</th>
                                    <th>内容</th>
                                    <th>添加时间</th>
                                    <th>点赞数</th>
                                    <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 

                                foreach ($data as $key => $value) {
                                  ?>
                                  <tr>
                                    <td> <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary"></td>
                                    <td><?php echo $value['news_id']; ?></td>
                                    <td><?php echo $value['title']; ?></td>
                                    <td><?php echo $value['author']; ?></td>
                                    <td><?php echo $value['des']; ?></td>
                                     <td><?php echo $value['content']; ?></td>
                                    <td><?php echo $value['addtime']; ?></td>
                                     <td><?php echo $value['times']; ?></td>
                                    <td class="td-manage">
                                      <a title="编辑"   href="/news/update/newsid/<?php echo $value['news_id'];?>">
                                        <i class="layui-icon">&#xe642;</i>
                                      </a>
                                      <a title="删除" onclick='del(<?php echo $value['news_id']; ?>)' href="javascript:;">
                                        <i class="layui-icon">&#xe640;</i>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php
                                }




                                ?>
                                 
                                    
                                </tbody>
                            </table>
                        </div>
                      <!--   <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                  <a class="prev" href="">&lt;&lt;</a>
                                  <a class="num" href="">1</a>
                                  <span class="current">2</span>
                                  <a class="num" href="">3</a>
                                  <a class="num" href="">489</a>
                                  <a class="next" href="">&gt;&gt;</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      function del(id){
        $.ajax({
          url:"/news/del",
          type:"post",
          data:{news_id:id},
          success:function(res){
            if(res==1){
              alert("删除成功");
              history.go(0);
            }else{
                alert("删除失败");
              history.go(0);
            }
          }
        })
      }
    </script>
</html>