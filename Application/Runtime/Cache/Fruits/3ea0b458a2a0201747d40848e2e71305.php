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
<style type="text/css">
	.fcont{
		color:red;
		padding-top:5px;
	}
	.address_manage .yrd_col .jztime {
    float: left;
    margin-top: 5px;
    color: #06c;

</style>
<body>
<div class="touchweb-com_header header_flex" id="globalHeader">
<a id="topIconBack" class="left icon-back" href="javascript:history.go(-1);" data-tpa="H5_GLOBAL_ICON_GOBACK" data-trackerSend="1"></a>
<h1>会员最新权益</h1>
<div class="rightBox" data-tpa="H5_GLOBAL_ICON_RIGHTBOX">
</div></div>
<section class="main address_manage">


<article class="yrd_col clearfix">
<b>开店大酬宾,会员到店消费7折！</b>
<br>
<div class="fcont">疯狂3天！会员到店消费全场7折，结算时只需报会员号或注册的手机号即可！非会员消费8折！</div>
<a href="#" data-tpa="1301" class="edite_address" id="editeAddress" >详情>>></a>
<a href="#" data-tpa="1301" class="edite_address jztime" id="editeAddress" >截至日期：2016/08/15</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</article>



<article class="yrd_col clearfix">
<b>会员专属日，买水果有惊喜！</b>
<br>
<div class="fcont">星期五会员日！星期会员日！星期五会员日！！！重要事情必须说三遍！会员到店消费9折！！！每天随机抽取一位用户随机赠送0~50元优惠券！</div>
<a href="#" data-tpa="1301" class="edite_address" id="editeAddress" >详情>>></a>
<a href="#" data-tpa="1301" class="edite_address jztime" id="editeAddress" >截至日期：2017/08/15</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</article>
</section>
<div class="tipMask"></div>
</div>
<!--全局导航-Start-->
<div class="global-nav">
<div class="global-nav__nav-wrap">
<div class="global-nav__nav-item">
<a href="#" class="global-nav__nav-link">
<i class="global-nav__iconfont global-nav__icon-index">&#xf0001;</i>
<span class="global-nav__nav-tit">首页</span>
</a>
</div>
<div class="global-nav__nav-item">
<a href="#" class="global-nav__nav-link">
<i class="global-nav__iconfont global-nav__icon-category">&#xf0002;</i>
<span class="global-nav__nav-tit">分类</span>
</a>
</div>
<div class="global-nav__nav-item">
<a href="#" class="global-nav__nav-link">
<i class="global-nav__iconfont global-nav__icon-search">&#xf0003;</i>
<span class="global-nav__nav-tit">搜索</span>
</a>
</div>
<div class="global-nav__nav-item">
<a href="http://cart.m.yhd.com/cart/showCart" class="global-nav__nav-link">
<i class="global-nav__iconfont global-nav__icon-shop-cart">&#xf0004;</i>
<span class="global-nav__nav-tit">购物车</span>
<span class="global-nav__nav-shop-cart-num" style="display:none;" id="carId"></span>
</a>
</div>
<div class="global-nav__nav-item">
<a href="http://m.yhd.com/myH5/h5Index/index.do" class="global-nav__nav-link">
<i class="global-nav__iconfont global-nav__icon-my-yhd">&#xf0005;</i>
<span class="global-nav__nav-tit">我的1号店</span>
</a>
</div>
</div>
<div class="global-nav__operate-wrap">
<span class="global-nav__yhd-logo"></span>
<span class="global-nav__operate-cart-num" style="display:none;" id="globalId"></span>
</div>
</div>
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
</html>