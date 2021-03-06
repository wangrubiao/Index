<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>会员中心</title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="minimal-ui=yes,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="msapplication-tap-highlight" content="no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="wap-font-scale" content="no">
<meta name="applicable-device" content="mobile">
<meta name="tp_page" content="5088.0">
<link href="/Public/<?php echo (C("projectName")); ?>/css/global_site_base.css" rel="stylesheet" type="text/css">
<link href="/Public/<?php echo (C("projectName")); ?>/css/h5Index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/<?php echo (C("projectName")); ?>/js/global_base_tracker.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/<?php echo (C("projectName")); ?>/js/global_base_common.js" charset="utf-8"></script>
</head>
<body>
<div class="touchweb-com_header header_flex" id="globalHeader"> <a id="topIconBack" class="left icon-back" href="http://m.yhd.com/" data-tpa="H5_GLOBAL_ICON_GOBACK" data-trackersend="1"></a>
  <h1>我的水果摊</h1>
  <div class="rightBox" data-tpa="H5_GLOBAL_ICON_RIGHTBOX"> <a href="#" class="right" id="btn_online_service" data-tpa="1457"> <span class="right_text icon-dialog"></span> <span class="icon_text"></span> </a> </div>
</div>
<div class="mine_main_content">
  <div class="desc">
    <div class="img"><img src="/Public/<?php echo (C("projectName")); ?>/images/tx.jpg"/></div>
    <div class="user_info"> <span>果友，欢迎回来！</span> <span>会员号：<?php echo ($account); ?></span>
      <ul>
        <li onclick="gotoPoint();" id="pointItem" data-tpa="1444"><em>积分</em><i>37</i></li>
        <li onclick="gotoAccount();" id="accountItem" data-tpa="1445"><em>本月消费</em><i>¥35.6</i></li>
      </ul>
    </div>
  </div>
  <ul>
    <li><a id="yhdlogistics" href="../Index/Privilege" data-tpa="1446"><b>了解会员消费权益</b><i>定期更新</i></a></li>
  </ul>
  <ul>
    <li><a id="yhdorder" href="../Index/order" data-tpa="1447">我的订单</a></li>
		<li><a id="mycou" href="../Index/detail" data-tpa="1448">积分明细</a></li>
    <li><a id="mycou" href="#" data-tpa="1448">我的抵用劵<i>0</i></a></li>
	
    <li><a id="myReservation" href="#" data-tpa="2711">生日特权</a></li>
  </ul>
  <ul>
    <li> <a href="http://my.m.yhd.com/myH5/h5Bind/h5BindMobile.do" data-tpa="1454">微信绑定 <em> 立即绑定 </em> </a> </li>
	    <li> <a href="http://my.m.yhd.com/myH5/h5Bind/h5BindMobile.do" data-tpa="1454">手机绑定 <em> 立即绑定 </em> </a> </li>
    <li> <a href="http://my.m.yhd.com/myH5/h5changePassword/h5ChangePassword.do" data-tpa="1455">修改密码 <em> </em> </a> </li>
  </ul>
  <a href="#" data-tpa="1456" class="logout">退出当前账户</a> </div>

<!--全局导航-Start-->
<div class="global-nav">
  <div class="global-nav__nav-wrap">
    <div class="global-nav__nav-item"> <a href="#" class="global-nav__nav-link"> <i class="global-nav__iconfont global-nav__icon-index">󰀁</i> <span class="global-nav__nav-tit">首页</span> </a> </div>
   <!-- <div class="global-nav__nav-item"> <a href="#" class="global-nav__nav-link"> <i class="global-nav__iconfont global-nav__icon-category">󰀂</i> <span class="global-nav__nav-tit">分类</span> </a> </div>
    <div class="global-nav__nav-item"> <a href="#" class="global-nav__nav-link"> <i class="global-nav__iconfont global-nav__icon-search">󰀃</i> <span class="global-nav__nav-tit">搜索</span> </a> </div>-->
    <div class="global-nav__nav-item"> <a href="#" class="global-nav__nav-link"> <i class="global-nav__iconfont global-nav__icon-shop-cart">󰀄</i> <span class="global-nav__nav-tit">购物车</span> 
	<span class="global-nav__nav-shop-cart-num" style="display: none;" id="carId"></span> </a> </div>
    <div class="global-nav__nav-item"> <a href="#" class="global-nav__nav-link"> <i class="global-nav__iconfont global-nav__icon-my-yhd">󰀅</i> <span class="global-nav__nav-tit">我的水果摊</span> </a> </div>
  </div>
  <div class="global-nav__operate-wrap"> <span class="global-nav__yhd-logo"></span> <span class="global-nav__operate-cart-num" style="display: none;" id="globalId"></span> </div>
</div>
<!--全局导航-End-->


</body>
</html>