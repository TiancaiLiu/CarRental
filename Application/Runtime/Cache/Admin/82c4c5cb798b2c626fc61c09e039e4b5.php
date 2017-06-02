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
       <h2 class="fl"><?php echo ($jobs["name"]); ?>--职信息详细</h2>
     </div>
     <table width="95%"  cellspacing="0" cellpadding="3" border="1" align="center"> 
          <tbody>
            <tr>
              <td height="40" align="center" colspan="4"><h2><strong>求职表</strong></h2></td>
            </tr>
            <tr>
              <td height="30" align="right" style="color: red;"><span>*</span>应聘职位：</td>
              <td height="30" align="left" colspan="3" style="padding-left: 5px;"><?php echo ($jobs["title"]); ?></td>
            </tr>
            <tr>
              <td height="30" align="right" style="color: red;"><span>*</span>真实姓名：</td>
              <td height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["name"]); ?></td>
              <td height="30" align="right" style="color: red;">性别：</td>
              <td height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["sex"]); ?></td>
            </tr>
            <tr>
              <td width="14%" height="30" align="right" style="color: red;">民族：</td>
              <td width="27%" height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["nation"]); ?></td>
              <td width="17%" height="30" align="right" style="color: red;">年龄</td>
              <td width="42%" height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["age"]); ?></tr>
            <tr>
              <td width="14%" height="30" align="right" style="color: red;">婚姻状况：</td>
              <td width="27%" height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["marry"]); ?></td>
              <td width="17%" height="30" align="right" style="color: red;">有无子女：</td>
              <td width="42%" height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["child"]); ?></td>
            </tr>
            <tr>
              <td width="14%" height="30" align="right" style="color: red;">籍贯：</td>
              <td width="27%" height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["bplace"]); ?></td>
              <td width="17%" height="30" align="right" style="color: red;">户口所在地：</td>
              <td width="42%" height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["address"]); ?></td>
            </tr>
            <tr>
              <td width="14%" height="30" align="right" style="color: red;">学历：</td>
              <td height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["education"]); ?></td>
              <td height="30" align="right" style="color: red;"><span>外语语种及程度：</span></td>
              <td height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["foreign"]); ?></td>
            </tr>
            <tr>
              <td width="14%" height="30" align="right" style="color: red;"><span>*</span>移动电话：</td>
              <td width="27%" height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["mobile"]); ?></td>
              <td width="17%" height="30" align="right" style="color: red;">电子邮件：</td>
              <td width="42%" height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["email"]); ?></td>
            </tr>
            <tr>
              <td height="30" align="right" style="color: red;">身份证号：</td>
              <td height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["idnums"]); ?></td>
              <td height="30" align="right" style="color: red;"><span>现住址：</span></td>
              <td height="30" align="left" style="padding-left: 5px;"><?php echo ($jobs["address_now"]); ?></td>
            </tr>
            <tr>
              <td width="14%" height="30" align="right" style="color: red;">可到职日期：</td>
              <td height="30" align="left" colspan="3"style="padding-left: 5px;"><?php echo ($jobs["slim"]); ?></td>
            </tr>
            <tr>
              <td width="14%" height="30" align="right" style="color: red;">备注：</td>
              <td height="120" align="left" colspan="3" style="padding-left: 5px;"><?php echo ($jobs["content"]); ?></td>
            </tr>
            
            
        </tbody></table>
        <br />
        <input type="button" class="link_btn" value="返回" onclick="history.go(-1)">
      
      
  </div>
</section>
</body>
</html>