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
       <h2 class="fl">栏目列表</h2>
       <a href="/Admin/Cate/add" class="fr top_rt_btn add_icon">添加栏目</a>
      </div>
      <form action="/Admin/Cate/search" method="post">
      <section class="mtb">
       <input type="text" name="keywords" class="textbox textbox_225" placeholder="输入栏目关键字..."/>
       <input type="submit" value="查询" class="group_btn"/>
      </section>
      </form>
      <form action="/Admin/Cate/sort" method="post">
       <input type="submit" name="submit" class="link_btn" value="更新排序" />
      <table class="table">
       <tr>
        <th style="width:10%">排序</th>
        <th style="width:10%">ID</th>
        <th>栏目名称</th>
        <th>操作</th>
       </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
          <td class="center"><input name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>" type="text" style="width: 25px;border-radius: 5px;text-align: center;" /></td>
          <td class="center"><?php echo ($v["id"]); ?></td>
          <td class="center"><?php echo ($v["catename"]); ?></td>
          <td class="center">
           <a href="/Admin/Cate/edit/id/<?php echo ($v["id"]); ?>" title="编辑" class="link_icon">&#101;</a>
           <a title="删除" class="link_icon" onclick="return confirm('确定要删除该栏目到回收站吗？');" href="/Admin/Cate/toTrach/id/<?php echo ($v["id"]); ?>">&#100;</a>
          </td>
         </tr><?php endforeach; endif; ?>
      </table>
      </form>
      <aside class="paging">
       <?php echo ($page); ?>
      </aside>
  </div>
</section>
</body>
</html>