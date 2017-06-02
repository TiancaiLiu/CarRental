<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="http://www.carshop.com/Application/Admin/Public/Css/style.css">
<!--[if lt IE 9]>
<script src="http://www.carshop.com/Application/Admin/Public/Js/html5.js"></script>
<![endif]-->
<script src="http://www.carshop.com/Application/Admin/Public/Js/jquery.js"></script>
<script src="http://www.carshop.com/Application/Admin/Public/Js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
<style type="text/css">
	.rt_content table{width:90%;font-family: "微软雅黑";border:1px solid #ccc;}
	.rt_content table tr th{height: 40px;text-align: right; width: 30%;}
	.rt_content table tr td{height: 40px;text-align: left;padding-left: 10px;}
	.require-red{color:#f60; font-family: serif; margin-right: 5px;}
    .reply{color:red;}
</style>
</head>
<body>
<!--header-->
<!--header-->
<header>
 <h1><img src="http://www.carshop.com/Application/Admin/Public/Images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/Admin/Index/index" class="website_icon">站点首页</a></li>
  <li><a href="/Admin/Index/cache" class="clear_icon">清除缓存</a></li>
  <li><a href="#" class="admin_icon"><?php echo $_SESSION['username']?></a></li>
  <li><a href="/Admin/Manage/edit/id/<?php echo $_SESSION['id']?>" class="set_icon">账号设置</a></li>
  <li><a href="/Admin/Index/logout" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="/Admin/Index/index">起始页</a></h2>
 <ul>
  <li>
   <dl>
    <dt>栏目管理</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/Admin/Cate/lst">栏目列表</a></dd>
    <dd><a href="/Admin/Cate/add">新增栏目</a></dd>
    <dd><a href="/Admin/Cate/trach">栏目回收站</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>文章管理</dt>
    <dd><a href="/Admin/Article/lst">文章列表</a></dd>
    <dd><a href="/Admin/Article/add">新增文章</a></dd>
    <dd><a href="/Admin/Article/trach">文章回收站</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>留言管理</dt>
    <dd><a href="/Admin/Message/lst">留言列表</a></dd>
    <dd><a href="/Admin/Message/trach">留言回收站</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>求职信息管理</dt>
    <dd><a href="/Admin/Job/lst">求职信息列表</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>系统管理</dt>
    <dd><a href="discharge_statistic.html">系统设置</a></dd>
    <dd><a href="/Admin/Manage/lst">管理员管理</a></dd>
    <dd><a href="sales_volume.html">权限列表</a></dd>
    <dd><a href="sales_volume.html">角色列表</a></dd>
    <dd><a href="sales_volume.html">数据管理</a></dd>
   </dl>
  </li>
  <li>
   <p class="btm_infor">© DeathGhost.cn 版权所有</p>
  </li>
 </ul>
</aside>
<!--content-->
<section class="rt_wrap content mCustomScrollbar">
  <div class="rt_content">
  	<div class="page_title">
       <h2 class="fl">留言回复</h2>
    </div>
    <form action="/Admin/Message/reply" method="post" enctype="multipart/form-data">
  	<table cellspacing="0" cellpadding="3" border="1" align="center">
  		<input type="hidden" name="mid" value="<?php echo ($message["id"]); ?>">
        <tbody>
            <tr>
                <th><i class="require-red">*</i>姓名：</th>
                <td><?php echo ($message["username"]); ?></td>
            </tr>
            <tr>
                <th><i class="require-red">*</i>手机：</th>
                <td><?php echo ($message["phone"]); ?></td>
            </tr>
            <tr>
                <th><i class="require-red">*</i>邮箱：</th>
                <td><?php echo ($message["email"]); ?></td>
            </tr>
            <tr>
                <th><i class="require-red">*</i>留言内容：</th>
                <td><?php echo ($message["content"]); ?></td>
            </tr>
            <?php if(is_array($replylist)): foreach($replylist as $key=>$v): ?><tr>
                <th class="reply">已回复的内容：</th>
                <td><?php echo ($v["content"]); ?></td>
            </tr><?php endforeach; endif; ?>
            <tr>
                <th>管理员回复:</th>
                <td>
                    <textarea name="content" cols="80" rows="6"></textarea>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="link_btn" value="提交" type="submit">
                    <input class="link_btn" onclick="history.go(-1)" value="返回" type="button">
                </td>
            </tr>
        </tbody>
    </table>
    </form>
  </div>
</section>
</body>
</html>