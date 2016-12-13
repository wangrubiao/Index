<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>我的订单</title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="minimal-ui=yes,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="msapplication-tap-highlight" content="no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="wap-font-scale" content="no">
<meta name="applicable-device" content="mobile">
<meta name="tp_page" content="5088.0">
<link href="/Public/<?php echo (C("projectName")); ?>/css/global_site_base.css" rel="stylesheet" type="text/css">
<link href="/Public/<?php echo (C("projectName")); ?>/css/h5PointDetail.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/<?php echo (C("projectName")); ?>/js/global_base_tracker.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/<?php echo (C("projectName")); ?>/js/global_base_common.js" charset="utf-8"></script>
</head>
<style type="text/css">
.fcont {
	color: red;
	padding-top: 5px;
}
.address_manage .yrd_col .jztime {
	float: left;
	margin-top: 5px;
	color: #06c;
</style>
<body>
<!-- h5 global top -->
<div class="pointsMall_page-pointsDetail">
  <div class="pointsMall_com-header "> <a href="javascript:history.go(-1);" class="left back"><span class="icon-arrow"></span></a>
    <h1>我的订单</h1>
  </div>
  <div class="old_points"><!--<a href="#" class="use_points">去使用<em class="icon-right_arrow"></em></a>-->水果摊<span>：</span> 看的见的消费！</div>
  <div class="can_use_points">
    <p class="use_points_tit">历史消费</p>
    <p class="points_num">¥159.80</p>
    <a href="#" class="gain_points" data-tpa="1469">那些年我们一起赞的分...</a> </div>
  <div class="points_tab_wrap">
    <div class="points_tab"> <a href="#" class="cur" onclick="getLog(0)" data-tpa="3073" data-trackersend="1">交易记录</a> 
	<!--<a href="#" onclick="getLog(1)" data-tpa="3074" data-trackersend="1">收入</a> 
	<a href="#" onclick="getLog(2)" data-tpa="3075" data-trackersend="1">消耗</a>-->
      <input type="hidden" value="0" id="tableType">
      <input type="hidden" value="10" id="pageSize">
    </div>
  </div>
  <input type="hidden" id="currentPage" value="2">
  <ul class="pointsMall_com-pointList">
    <li>
      <div class="point_wrapper">
        <div class="info_box"> <span class="title">订单号：10002151</span> [店面消费]<span class="time">2016-06-30 12:16:30</span> </div>
        <div class="point_box"><span class="point">¥ 37 </span> </div>
      </div>
    </li>

       <li>
      <div class="point_wrapper">
                <div class="info_box"> <span class="title">订单号：10002151</span> [平台消费]<span class="time">2016-06-30 12:16:30</span> </div>
        <div class="point_box"><span class="point">¥ 37 </span> </div>
      </div>
    </li>
       <li>
      <div class="point_wrapper">
               <div class="info_box"> <span class="title">订单号：10002151</span> [店面消费]<span class="time">2016-06-30 12:16:30</span> </div>
        <div class="point_box"><span class="point">¥ 37 </span> </div>
      </div>
    </li>
       <li>
      <div class="point_wrapper">
                <div class="info_box"> <span class="title">订单号：10002151</span> [平台消费]<span class="time">2016-06-30 12:16:30</span> </div>
        <div class="point_box"><span class="point">¥ 37 </span> </div>
      </div>
    </li>
	       <li>
      <div class="point_wrapper">
                 <div class="info_box"> <span class="title">订单号：10002151</span> [店面消费]<span class="time">2016-06-30 12:16:30</span> </div>
        <div class="point_box"><span class="point">¥ 37 </span> </div>
      </div>
    </li>
	       <li>
      <div class="point_wrapper">
                <div class="info_box"> <span class="title">订单号：10002151</span> [店面消费]<span class="time">2016-06-30 12:16:30</span> </div>
        <div class="point_box"><span class="point">¥ 37 </span> </div>
      </div>
    </li>
    <input type="hidden" value="">
    
 
    <input type="hidden" value="">
  </ul>
</div>

</body>
</html>