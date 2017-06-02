<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="telephone=no" name="format-detection" />
<meta name="Author" content="0431" />
<title>盘古租车</title>
<meta name="keywords" content="盘古租车" />
<meta name="description" content="盘古租车" />
<link rel="stylesheet" type="text/css" href="/Public/style/subpage.css" />  
<script type="text/javascript" src="/Public/style/jquery.js"></script>
<style>
.head { background: #1a2a38;}
.foot {background: #132330;}
.nav {background: #0152b5 !important}
.nav_color {background: #222;}
</style>
<script type="text/javascript" src="/Public/style/nav.js"></script>
<script type="text/javascript" src="/Public/style/cart_icon.js"></script>    
<link rel="stylesheet" type="text/css" href="/Public/style/child_vip.css" />   
</head>
<body>
<ul class="nav">
  <li><a href="" title="首页"><span class="iconfont">&#xe607;</span>首页</a></li>
  <?php if(is_array($cates)): foreach($cates as $key=>$v): ?><li>
   	 <a href="/Home/<?php if($v['id'] == 1): ?>Aboutus<?php elseif($v['id'] == 2): ?>Intro<?php elseif($v['id'] == 3): ?>Rental<?php elseif($v['id'] == 4): ?>Return<?php elseif($v['id'] == 5): ?>Moneylist<?php elseif($v['id'] == 6): ?>Activitylist<?php elseif($v['id'] == 7): ?>Carlist<?php elseif($v['id'] == 8): ?>Maintain<?php elseif($v['id'] == 9): ?>Contact<?php elseif($v['id'] == 11): ?>Message<?php endif; ?>/index/cateid/<?php echo ($v["id"]); ?>" title="关于我们">
   	 <?php echo ($v["catename"]); ?>
   	 </a>
    </li><?php endforeach; endif; ?>
</ul> 
<div class="allpage">
    <div class="black-fixed iconfont">&#xe60f;</div>
 <div class="header">
    <div class="head">
        <a href="/Home/index" title="首页" class="home-btn commonfont">&#xe608;</a>        
        <p class="top-title"><?php echo ($catename); ?></p>
        <div class="class-btn"><span class="commonfont">&#xe60a;</span></div>
        <div class="nav-btn commonfont">&#xe60b;</div>
    </div>
    <div class="type">      
        <h1>搜索：</h1>
        <div class="common-pro-search">
            <form action="/Home/Search/index" method="post">
                <input type="text" class="common-text" name="kws" value="" placeholder="请输入搜索关键词" id="kws" />
                <input type="submit" class="common-submit commonfont" value="&#xe602;"/>
            </form>
        </div>
    </div>
</div>   
<div class="content">
    <p class="red_alert"></p>
    <ul class="login">
      <form method="post" action="/Home/Message/addmsg" name="form1" class="msgForm">
        <li>
            <input class="login_input" name="title" type="text" id="title" placeholder="标题"/>
        </li>
        <li>
            <input class="login_input" name="username" type="text" id="title" placeholder="您的姓名"/>
        </li>
        <li>
            <input class="login_input" name="phone" type="text" id="title" placeholder="您的电话"/>
        </li>
        <li>
            <input class="login_input" name="email" type="text" id="title" placeholder="您的邮箱"/>
        </li>
        <li>
            <textarea class="login_textarea" name="content" id="content" cols="30" rows="10" placeholder="内容"></textarea>
        </li>
        <li>
            <input class="login_input pin_width" name="verify" type="text" maxlength="4" placeholder="请输入验证码"/>
            <img src="/Home/Message/verify" class="login_pin" onclick="this.src='/Home/Message/verify/'+Math.random();"  style="cursor:pointer;" title="看不清，换一张"/>
        </li>
        <li>
            <input class="login_btn common_bg" id="baidu-book" type="submit" value="提   交"/>
        </li>
        <li>
            <input class="login_btn common_bg" id="baidu-book" type="button" onclick="history.go(-1)" value="返   回"/>
        </li>
      </form>
    </ul>
</div>
<div class="footer">
    <div class="foot foot-relative" id="foot">
        <div class="foot-relative">
        <a href="/index.php/Cnm/Base/map.html" title="地图">
                        <span class="commonfont">&#xe605;</span>
                        <h3>地图</h3>
                    </a><a href="tel:+86-0000-96877" title="电话">
                        <span class="commonfont">&#xe604;</span>
                        <h3>电话</h3>
                    </a><a href="sms:+86-0000-96877" title="短信">
                        <span class="commonfont">&#xe601;</span>
                        <h3>短信</h3>
                    </a><a href="/index.php/Cnm/Base/share.html" title="分享">
                        <span class="commonfont">&#xe600;</span>
                        <h3>分享</h3>
                    </a>            
            
        </div>
    </div>
</div> 
</div>
<script type="text/javascript">

</script> 
</body>
</html>