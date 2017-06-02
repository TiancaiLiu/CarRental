<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html style="font-size: 120px;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="telephone=no" name="format-detection">
<meta name="Author" content="024">
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="telephone=no" name="format-detection" />
<meta name="Author" content="0431" />
<title>盘古租车</title>
<meta name="keywords" content="盘古租车" />
<meta name="description" content="盘古租车" />
<link rel="stylesheet" type="text/css" href="/Public/style/subpage.css" />
<link rel="stylesheet" type="text/css" href="/Public/style/master.css" />
<link rel="stylesheet" type="text/css" href="/Public/style/subpage.css" />
<link rel="stylesheet" type="text/css" href="/Public/style/child_vip.css" />
<link rel="stylesheet" type="text/css" href="/Public/style/swiper.css" />	
<script type="text/javascript" src="/Public/style/jquery.js"></script>
<script type="text/javascript" src="/Public/style/nav.js"></script>
<script type="text/javascript" src="/Public/style/cart_icon.js"></script>
<script type="text/javascript" src="/Public/style/swiper.js"></script>
<script type="text/javascript" src="/Public/style/lihe.js"></script>
<style>
.head {background: #1a2a38;}
.foot {background: #132330;}
.nav {background: #0152b5 !important}
.nav_color {background: #222;}
</style>
</head>
<body>
<!--nav start-->
<ul class="nav">
  <li><a href="" title="首页"><span class="iconfont">&#xe607;</span>首页</a></li>
  <?php if(is_array($cates)): foreach($cates as $key=>$v): ?><li>
   	 <a href="/Home/<?php if($v['id'] == 1): ?>Aboutus<?php elseif($v['id'] == 2): ?>Intro<?php elseif($v['id'] == 3): ?>Rental<?php elseif($v['id'] == 4): ?>Return<?php elseif($v['id'] == 5): ?>Moneylist<?php elseif($v['id'] == 6): ?>Activitylist<?php elseif($v['id'] == 7): ?>Carlist<?php elseif($v['id'] == 8): ?>Maintain<?php elseif($v['id'] == 9): ?>Contact<?php elseif($v['id'] == 11): ?>Message<?php endif; ?>/index/cateid/<?php echo ($v["id"]); ?>" title="关于我们">
   	 <?php echo ($v["catename"]); ?>
   	 </a>
    </li><?php endforeach; endif; ?>
</ul>
<!--nav end-->

<div class="allpage">
  <div class="black-fixed iconfont">&#xe60f;</div>
  <!--header-->
  <div class="header">
  <div class="head"><a href="" title="盘古网络" class="logo"> <img src="/Public/images/logo_03.png" alt="盘古网络"/></a>
    <div class="nav-btn iconfont">&#xe605;</div>
    <!--搜索-->
    <div class="search_hl iconfont">&#xe600;</div>
    <div class="search" style="display: block;">
      <form action="" method="post">
        <a class="xbtn iconfont" href="javascript:;">&#xe60f;</a>
        <input type="text" name="kws" class="search-lh-input" placeholder="请输入搜索关键词">
        <input type="submit" class="search-lh-btn iconfont" value="&#xe600;">
      </form>
    </div>
    <!--搜索--> 
  </div>
</div>
  <!--header end-->
  
  <div class="content content_new">
    <div class="lines">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="lines lines01">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="lines01"></div>
    <div class="banner">
      <div class="swiper-container">
        <div class="swiper-wrapper">
           <div class="swiper-slide">
              <img src="/Public/images/E9B74D0114665E84D9580C171F6B7A83.jpg" />
            </div>
           <div class="swiper-slide">
              <img src="/Public/images/BAAE4C726F3E1A3E34ED76AC4AC4A8E9.jpg" />                  
           </div>        
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
       
    <!--图片导航-->
    <div class="tubiao_i">
    	<ul>
        <li> <a href="/Home/Aboutus/index/cateid/1"><span class="iconfont02">&#xe614;</span><strong>关于我们</strong></a> </li>
        <li> <a href="/Home/Rental/index/cateid/3"><span class="iconfont02">&#xe7c7;</span><strong>如何租车</strong></a> </li>
        <li> <a href="/Home/Return/index/cateid/4"><span class="iconfont02">&#xe628;</span><strong>如何还车</strong></a> </li>
        <li> <a href="/Home/Moneylist/index/cateid/5"><span class="iconfont02">&#xe61b;</span><strong>费用说明</strong></a> </li>
        <li> <a href="/Home/Activitylist/index/cateid/6"><span class="iconfont02">&#xe64b;</span><strong>优惠活动</strong></a> </li>
        <li> <a href="/Home/Carlist/index/cateid/7"><span class="iconfont02">&#xe656;</span><strong>车辆展示</strong></a> </li>
        <li> <a href=""><span class="iconfont02">&#xf00bc;</span><strong>车辆保养</strong></a> </li>
        <li> <a href="/Home/Contact/index/cateid/9"><span class="iconfont02">&#xe66f;</span><strong>联系我们</strong></a> </li>      
        <div class="clear"></div>
        </ul>
    </div>
    <!---->
    <!---->
    <div class="ling_i">
     <a href=""><img src="/Public/images/8A6B1622242744F4619AB05364247FE6.gif" alt=""></a> 
    	
    </div>
    <!---->
     
      <!--车辆展示-->
    <div class="lines">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="lines lines01">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="more_i"><span>车辆展示</span><a href="/Home/Carlist/index/cateid/7" title="更多">更多</a> </div>
    <div class="display_i">
      <div class="display_i01">
       <!-- <a href="/index.php/Cnm/Product/index/tid/1.html">汽车分类一</a><a href="/index.php/Cnm/Product/index/tid/2.html">车辆分类二</a> -->  
      
        <div class="clear"></div>
      </div>
      <div class="display_i02">
        <?php if(is_array($carlist)): foreach($carlist as $key=>$v): ?><dl>
          <a href="/Home/Cardetail/index/id/<?php echo ($v["id"]); ?>">
          <dt><img src="/<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["title"]); ?>"></dt>
          <dd>
            <h2><?php echo ($v["title"]); ?></h2>
            <span>日租：<?php echo ($v["rental"]); ?>天</span></dd>
          </a>
        </dl><?php endforeach; endif; ?>
        <div class="clear"></div>
      </div>
    </div>
    <!--经典案例 end--><!--车辆展示-->
    <div class="lines">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="lines lines01">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="more_i"><span>客户评价</span><a href="/Home/Message/index" title="更多">更多</a></div>
    <div class="pingj_i">
      <?php if(is_array($msglist)): foreach($msglist as $key=>$v): ?><dl>
        <a href="/Home/Message/index/">
        <dt><?php echo ($v["title"]); ?></dt>
        <dd><?php echo (date("Y-m-d",$v["date"])); ?></dd>
        <div class="clear"></div>
        </a>
      </dl><?php endforeach; endif; ?>    
    </div>
    <!--经典案例 end--><!--优惠活动-->
    <div class="lines">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="lines lines01">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="more_i"><span>优惠活动</span><a href="/Home/Activitylist/index/cateid/6" title="更多">更多</a></div>
    <div class="case_c">
      <?php if(is_array($activity)): foreach($activity as $key=>$v): ?><ul>
        <li><a href="/Home/Activitydetail/index/id/<?php echo ($v["id"]); ?>">
          <div class="case_c_pic"><img src="/<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["title"]); ?>"></div>
          <div class="case_c_content">
            <h2><?php echo ($v["title"]); ?></h2>
            <strong>日期：<?php echo (date("Y-m-d",$v["date"])); ?><br></strong>
            <span><?php echo htmlspecialchars_decode($v['content']);?></span> </div><div class="clear"></div></a>
        </li>    
      </ul><?php endforeach; endif; ?>
    </div>
    <!--优惠活动 end--><!--关于我们--> 
    <div class="lines">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="lines lines01">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="more_i"><span>关于我们</span><a href="/Home/Aboutus/index/cateid/1" title="更多">更多</a></div>
    <div class="about_i">今日盘古，如朝阳初升。在中国国际实力日益壮大，经济全球化日益凸显的时代背景下，盘古也将扮演着更为重要的角色，承载着中国更多企业的商业梦想，背负着中国信息产业国际化的历史重任。 盘古网络，百度最大的代理商； 盘古网络，百度首家跨省经营的代理商； 盘古网络，百度唯一一家拥有省级代理资质的代理商。 精诚合作，共赴成功！</div>
    
    <!--关于我们 end--><!--车辆保养-->
    <div class="lines">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="lines lines01">■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■</div>
    <div class="more_i"><span>费用说明</span><a href="/Home/Moneylist/index/cateid/5" title="更多">更多</a></div>
    <div class="pingj_i about_i01">
    <?php if(is_array($money)): foreach($money as $key=>$v): ?><dl>
        <a href="/Home/Moneydetail/index/id/<?php echo ($v["id"]); ?>">
        <dt><?php echo ($v["title"]); ?></dt>
        <dd><?php echo (date("Y-m-d",$v["date"])); ?></dd>
        <div class="clear"></div>
        </a>
      </dl><?php endforeach; endif; ?>
    </div>       
  <!--技术支持-->
    <div class="beian"> 技术支持：<a title="盘古网络－提供基于互联网的全套解决方案" target="_blank" href="">盘古网络</a><a title="盘古建站－快速开展网络营销的利器" target="_blank" href="">【盘古建站】</a>　 </div>
    <!--技术支持 end--> 
  </div>
  <!--footer start-->
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
  <!--footer end-->
    
    
  
</div>
</body>
</html>