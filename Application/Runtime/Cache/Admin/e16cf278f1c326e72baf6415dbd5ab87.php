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
       <h2 class="fl">新增文章</h2>
       <a class="fr top_rt_btn">返回文章列表</a>
      </div>
     <form action="/Admin/Article/add" method="post" id="myform" name="myform" enctype="multipart/form-data">
     <section>
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">文章标题：</span>
        <input type="text" name="title" class="textbox textbox_295" placeholder="文章标题..."/>
        <span class="errorTips">必填信息...</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">文章作者：</span>
        <input type="text" name="author" class="textbox" placeholder="文章作者..."/>
        <span class="errorTips">必填信息...</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">日租：</span>
        <input type="text" name="rental" class="textbox" placeholder="日租..."/>
        <span class="errorTips">文章类型若为车型展示，则填写该项(填写数字)...</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">招聘人数：</span>
        <input type="text" name="num" class="textbox" placeholder="招聘人数..."/>
        <span class="errorTips">文章类型若为人才招聘，则填写该项(填写数字)...</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">所属栏目：</span>
        <select class="select" name="cateid">
         <option value="">选择栏目 ▼</option>
          <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <span class="errorTips">必填信息...</span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">是否推荐：</span>
        <label class="single_selection"><input type="radio" name="recommend" value="1" />推荐</label>
        <label class="single_selection"><input type="radio" name="recommend" value="0" />不推荐</label>
       </li>
       <li>
        <span class="item_name" style="width:120px;">上传图片：</span>
        <input type="file" name="pic" value="" />
       </li>
       <li>
        <span class="item_name" style="width:120px;">产品详情：</span>
        <textarea class="item_name" id="content" name="content"></textarea>
       </li>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" name="submit" class="link_btn"/>
        <input class="link_btn" onclick="history.go(-1)" value="返回" type="button">
       </li>
      </ul>
     </section>
     </form>
 </div>
</section>
<script src="http://www.carshop.com/Application/Admin/Public/Js/ueditor.config.js"></script>
<script src="http://www.carshop.com/Application/Admin/Public/Js/ueditor.all.min.js"> </script>
<script type="text/javascript">
   UE.getEditor('content',{initialFrameWidth:1000,initialFrameHeight:400,});
</script>
</body>
</html>