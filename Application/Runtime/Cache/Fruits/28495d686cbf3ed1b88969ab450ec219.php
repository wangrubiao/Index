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
    <h1>积分明细</h1>
  </div>
  <div class="old_points"><a href="#" class="use_points">去使用<em class="icon-right_arrow"></em></a>温馨提示<span>：</span> 积分兑换正在努力筹备中！</div>
  <div class="can_use_points">
    <p class="use_points_tit">可用积分</p>
    <p class="points_num">0</p>
    <a href="#" class="gain_points" data-tpa="1469">如何获取积分</a> </div>
  <div class="points_tab_wrap">
    <div class="points_tab"> <a href="#" class="cur" onclick="getLog(0)" data-tpa="3073" data-trackersend="1">全部</a> 
	<a href="#" onclick="getLog(1)" data-tpa="3074" data-trackersend="1">收入</a> 
	<a href="#" onclick="getLog(2)" data-tpa="3075" data-trackersend="1">消耗</a>
      <input type="hidden" value="0" id="tableType">
      <input type="hidden" value="10" id="pageSize">
    </div>
  </div>
  <input type="hidden" id="currentPage" value="2">
  <ul class="pointsMall_com-pointList">
    <li>
      <div class="point_wrapper">
        <div class="info_box"> <span class="title">订单完成</span> <span class="time">2016-06-30 12:16:30</span> </div>
        <div class="point_box"> <span class="point"> +37 </span> </div>
      </div>
    </li>
    <li>
      <div class="point_wrapper">
        <div class="info_box"> <span class="title">[ 积分过期 ]2015年前积分过期 </span> <span class="time">2015-08-08 02:57:03</span> </div>
        <div class="point_box"> <span class="point point_consume"> -40 </span> </div>
      </div>
    </li>
    <li>
      <div class="point_wrapper">
        <div class="info_box"> <span class="title">商品评论</span> <span class="time">2014-06-30 10:38:39</span> </div>
        <div class="point_box"> <span class="point"> +2 </span> </div>
      </div>
    </li>
    <li>
      <div class="point_wrapper">
        <div class="info_box"> <span class="title">商品评论</span> <span class="time">2014-06-25 16:43:32</span> </div>
        <div class="point_box"> <span class="point"> +2 </span> </div>
      </div>
    </li>
    <li>
      <div class="point_wrapper">
        <div class="info_box"> <span class="title">商品评论</span> <span class="time">2014-06-23 11:31:37</span> </div>
        <div class="point_box"> <span class="point"> +12 </span> </div>
      </div>
    </li>
    <input type="hidden" value="">
    <li>
      <div class="point_wrapper">
        <div class="info_box"> <span class="title">商品评论</span> <span class="time">2014-06-10 23:21:47</span> </div>
        <div class="point_box"> <span class="point"> +12 </span> </div>
      </div>
    </li>
    <li>
      <div class="point_wrapper">
        <div class="info_box"> <span class="title">商品评论</span> <span class="time">2014-04-30 11:46:26</span> </div>
        <div class="point_box"> <span class="point"> +2 </span> </div>
      </div>
    </li>
    <input type="hidden" value="">
  </ul>
</div>

</body>
</html>