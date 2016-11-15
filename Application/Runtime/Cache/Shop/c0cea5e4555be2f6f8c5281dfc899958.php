<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>您已成功下单，感谢你的支持！</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<link href="/Public/<?php echo (C("projectName")); ?>/style/order.css" rel="stylesheet" type="text/css">
<style type="text/css">
img{
  vertical-align:middle;
}
</style>
</head>

<body>
<div class="okDiv">
  <div class="top">
    <div class="chenggong">
       <?php if(($result["paytype"]) == "0"): ?><div id="t1" style="display: block;"><span style="color:#FFFFFF;">订单提交成功</span></div>
       <div id="t2" style="display: block;">我们将马上安排发货，很快将可以送到你的手上。祝您生活愉快！</div>
       <?php else: ?>
       <div id="t1" style="display: block;"><span style="color:#FFFFFF;">订单付款成功</span></div>
       <div id="t2" style="display: block;">感谢您的支持，我们将马上安排发货，请留意我们客服电话通知.</div><?php endif; ?>
    </div>
  </div>
  <div class="content"> 
    <!-- 返回订单信息 --> 
    <ul>
    <li> 订单号：<?php echo ($result["order"]); ?></li>
    <li>姓名：<?php echo ($result["consignee"]); ?></li>
    <li>电话：<b><font color="red"><?php echo ($result["mob"]); ?></font></b></li>
    <li>颜色：<?php echo ($result["product"]); ?></li>
    <li>尺码：<?php echo ($result["size"]); ?></li>
    <li>金额：<?php echo ($result["mey"]); ?></li>
    <?php if(($result["paytype"]) == "0"): ?><li> 付款方式： <img src="/Public/<?php echo (C("projectName")); ?>/images/payb.gif" border="0"> </li>
   <?php else: ?>
       <li> 付款方式：<img  src="/Public/<?php echo (C("projectName")); ?>/images/zhifubao.gif" border="0"> </li><?php endif; ?>
   
    <li>地址：<?php echo ($result["address"]); ?></li>
    </ul>
  </div>
  <div class="bottom"> 
    <!-- 返回支付方式 -->
    
    <div class="btnDiv"><a href="javascript:void(0)" target="_blank"><img src="/Public/<?php echo (C("projectName")); ?>/images/btn5.jpg" alt="" border="0/"></a> </div>
  </div>
</div>

<!-- 返回邮箱发送 -->
<div style="display:none"> </div>
</body>
</html>
<script src="/Public/<?php echo (C("projectName")); ?>/js/jquery-1.8.1.min.js"></script> 
<script>
$(".btnDiv a").on("click",function(){
  window.location.href="<?php echo ($tjdz); ?>";
});
</script>