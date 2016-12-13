<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="320" name="MobileOptimized">
<meta content="telephone=no" name="format-detection">
<link rel="stylesheet" href="/Public/<?php echo (C("projectName")); ?>/style/qdwap.css">
<link rel="stylesheet" href="/Public/<?php echo (C("projectName")); ?>/style/comment.css">
<link rel="shortcut icon" href="/Public/Admin/lib/font-awesome/docs/assets/ico/favicon.ico">
<title><?php echo ($info["title"]); ?></title>
<meta name="keywords" content="<?php echo ($info["title"]); ?>">
<meta name="description" content="<?php echo ($info["title"]); ?>">
<style>
body {
	background: #856D35;
}
#page {
	max-width: 750px;
}
.spec {
	color: #000000;
}
.row1 strong { display:block;width:35%;float:left;font-size:28px;color:#ff0;text-shadow:1px 1px 0px #000; line-height:60px;}
.tabClick ul{
  padding: 0px;
  width: 100%;
  height:40px;
  background: #F6F6F6;
  border: 1px #ccc solid;
  border-bottom: none;
  border-right: 0px;
  border-left: 0px;
  margin-bottom: 10px;
}
.tabClick ul li{
  float: left;
  width: 25%;
  height: 40px;
  line-height: 40px;
  text-align:center;
  border: 1px #E5E5E5 solid;
}
.tabClick ul li a{
  cursor:pointer;
  display: block;
  padding: 0;
  color: #3C3C3C;
  outline: 0;
  line-height: 40px;
}
.tabClick ul .cus{
  background: #777E90;
  border: none;
  border-top:none;
}
.tabClick ul .cus a{
  color: #ffffff;
}
.bnt_blue_2 {
    background: url(https://img.alicdn.com/imgextra/i3/2209555500/TB2E9BDmFXXXXa2XXXXXXXXXXXX_!!2209555500.gif) 0 0 repeat-x;
    width: 107px;
    height: 28px;
    text-align: center;
    line-height: 21px;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 12px;
    font-family: "微软雅黑";
}
</style>
</head>
<body>
<div id="page">
  <header>
    <h1><?php echo ($info["title"]); ?></h1>
  </header>
  <div class="banner">
    <p><img src="<?php echo ($picture[0]); ?>" width="100%"></p>
  </div>
  <section class="buy">
    <div class="row1"> <strong>￥<?php echo ($info["discount"]); ?></strong>
      <ol>
        <li>
          <p>原价</p>
          ￥<?php echo ($info["counter"]); ?></li>
        <li>
          <p>折扣</p>
          <?php echo ($discount); ?></li>
        <li>
          <p>节省</p>
          ￥<?php echo ($info['counter']-$info['discount']); ?></li>
      </ol>
    </div>
    <div class="row2"> <strong><?php echo ($info["records"]); ?>人已购买</strong>
      <div class="djs">
        <div class="time-count">
          <div id="remainTime_1" class="jltimer"><span>01</span>天<span>12</span>小时<span>27</span>分<span>40</span>秒</div>
        </div>
      </div>
    </div>
    <article class="des"></article>
    <a class="btn" href="#buy">立即购买</a> </section>
  <article class="tabClick">
    <ul>
      <li id="tabs1" class="cus"><a href="javascript:void(0);">宝贝详情</a></li>
      <li id="tabs4"><a href="javascript:void(0);">产品参数</a></li>
      <li id="tabs2"><a href="javascript:void(0);">累计评论</a></li>
      <li id="tabs3"><a href="javascript:void(0);">更多款式</a></li>
    </ul>
  </article>
  <article class="showtabs js_tabs1">
    <div class="btn detailed">
   <?php echo ($info["point"]); ?>
    </div>
    <h2>购买流程</h2>
    <p><img src="https://img.alicdn.com/imgextra/i4/2209555500/TB2SnW5kFXXXXcbXXXXXXXXXXXX_!!2209555500.jpg"></p>
    <h2>产品简介</h2>
    <p><?php echo ($info["content"]); ?></p>
  </article>
  <!--累计评论-->
  <article class="showtabs js_tabs2" style="display:none;">
    
  </article>
  <article class="showtabs js_tabs4" style="display:none;">
      <?php echo ($info["attribute"]); ?>
  </article>
  <article class="showcontent">
    <h2>客户服务</h2>
    <div class="btn">
      <p><span style="font: 16px/24px Helvetica, Arial, san-serif; color: rgb(0, 0, 0); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; float: none; display: inline !important; white-space: normal; font-size-adjust: none; font-stretch: normal; background-color: rgb(249, 249, 249); -webkit-text-stroke-width: 0px;"></span></p>
      <p>支持7天无理由退换货！发现非正品，商家承担来回运费，<strong>让客户享受满意购物！</strong></p>
      <p></p>
      <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2278906920&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:2278906920:51" alt="QQ咨询" title="QQ咨询"/></a> <a class="btn" href="sms:13246891178">短信订购：13246891178</a> </div>
  </article>
  <article id="buy">
    <h2 name="buy">订单信息</h2>
    
    <!--订单-->
    <div id="order"><script>var notzfbzk="0";</script>
      <div class="warp">
        <form id="form" name="form" action="<?php echo U('Index/order');?>" method="post" onsubmit="return postcheck()">
          <input type="hidden" name="mun" value="1">
          <div class="bdbox">
            <label class="bdxx"><em>*</em>产品</label>
            <div class="dxbox red">
              <?php if(is_array($spec)): foreach($spec as $key=>$vo): ?><label>
                  <?php if($vo['id'] == 1 ): ?><input type="radio" name="product" id="spec" class="spec" value="<?php echo ($vo["id"]); ?>" alt="<?php echo ($vo["spec_name"]); ?>">
                    &nbsp;&nbsp;<?php echo ($vo["spec_name"]); ?>&nbsp;
                    <?php else: ?>
                    <input type="radio" name="product" id="spec" class="spec" value="<?php echo ($vo["id"]); ?>" alt="<?php echo ($vo["spec_name"]); ?>">
                    &nbsp;&nbsp;<?php echo ($vo["spec_name"]); ?>&nbsp;<?php endif; ?>
                </label>
                <br/><?php endforeach; endif; ?>
            </div>
          </div>
          <!--附加属性b-->
          
          <div class="bdbox">
            <label class="bdxx"><em>*</em>尺码</label>
            <div class="dxbox red" id="sku">
              <?php if(is_array($sku)): foreach($sku as $key=>$vo): ?><label class="sku">
                  <input type="radio" name="chicun" value="<?php echo ($vo["id"]); ?>" alt="<?php echo ($vo["spec_mey"]); ?>">
                  &nbsp;&nbsp;<?php echo ($vo["focus_name"]); ?></label>
                <br><?php endforeach; endif; ?>
            </div>
          </div>
          
          <!--附加属性e-->
          <div class="bdbox">
            <label class="bdxx"><em>*</em>姓名</label>
            <div class="textbox">
              <input type="text" name="name">
            </div>
          </div>
          <div class="bdbox">
            <label class="bdxx"><em>*</em>手机</label>
            <div class="textbox">
              <input type="text" name="mob">
            </div>
          </div>
          <div class="bdbox">
            <label class="bdxx"><em>*</em>地区</label>
            <div class="xlbox">
              <select name="province" class="dqxl">
                <option value="">选省份</option>
                <option value="北京市">北京市</option>
                <option value="天津市">天津市</option>
                <option value="河北省">河北省</option>
                <option value="山西省">山西省</option>
                <option value="内蒙古自治区">内蒙古自治区</option>
                <option value="辽宁省">辽宁省</option>
                <option value="吉林省">吉林省</option>
                <option value="黑龙江省">黑龙江省</option>
                <option value="上海市">上海市</option>
                <option value="江苏省">江苏省</option>
                <option value="浙江省">浙江省</option>
                <option value="安徽省">安徽省</option>
                <option value="福建省">福建省</option>
                <option value="江西省">江西省</option>
                <option value="山东省">山东省</option>
                <option value="河南省">河南省</option>
                <option value="湖北省">湖北省</option>
                <option value="湖南省">湖南省</option>
                <option value="广东省">广东省</option>
                <option value="广西壮族自治区">广西壮族自治区</option>
                <option value="海南省">海南省</option>
                <option value="重庆市">重庆市</option>
                <option value="四川省">四川省</option>
                <option value="贵州省">贵州省</option>
                <option value="云南省">云南省</option>
                <option value="西藏自治区">西藏自治区</option>
                <option value="陕西省">陕西省</option>
                <option value="甘肃省">甘肃省</option>
                <option value="青海省">青海省</option>
                <option value="宁夏回族自治区">宁夏回族自治区</option>
                <option value="新疆维吾尔自治区">新疆维吾尔自治区</option>
                <option value="香港特别行政区">香港特别行政区</option>
                <option value="澳门特别行政区">澳门特别行政区</option>
                <option value="台湾省">台湾省</option>
              </select>
              <select name="city" class="dqxl">
                <option value="市辖区">市辖区</option>
                <option value="市辖县">市辖县</option>
              </select>
              <select name="area" class="dqxl">
                <option value="密云县">密云县</option>
                <option value="延庆县">延庆县</option>
              </select>
            </div>
          </div>
          <div class="bdbox">
            <label class="bdxx"><em>*</em>地址</label>
            <div class="textbox">
              <input type="text" name="address">
            </div>
          </div>
          <div class="bdbox">
            <label class="bdxx"><em>*</em>金额</label>
            <div class="text3box">
              <input name="price" class="price" value="<?php echo ceil($info['discount']); ?>" readonly/>
              元 <span id="zfbyh"></span> </div>
          </div>
          <div class="bdbox">
            <label class="bdxx"><em>*</em>付款</label>
            <div class="dxbox">
              <input type="radio" class="closeShow" checked="checked" name="payment" id="b1" value="0">
              <label for="b1"><img src="/Public/<?php echo (C("projectName")); ?>/images/hdfk.gif"></label>
              <input type="radio" class="alipayShow" name="payment" id="b2" value="1">
              <label for="b2"><img src="/Public/<?php echo (C("projectName")); ?>/images/zhifubao.gif"></label>
            </div>
          </div>
          <div class="bdbox know" style="display:none;">
            <label class="bdxx"><em>*</em>需知</label>
            <div class="text2box" style="font-size:12px;">
              <p>收款方为第三方支付服务商
              <p>付款后24小时内安排发货，请确保信息准确。客服QQ：2278906920</p>
            </div>
          </div>
          <div class="bdbox">
            <label class="bdxx">留言</label>
            <div class="text2box">
              <textarea name="guest"></textarea>
            </div>
          </div>
          <div class="subbox">
            <input type="hidden" name="rule" value="<?php echo ($rule); ?>">
            <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
            <input type="hidden" name="figure" value="https://img.alicdn.com/imgextra/i1/2209555500/TB2JY0qjpXXXXauXXXXXXXXXXXX_!!2209555500.jpg">
            <input type="hidden" name="title" value="<?php echo ($info["title"]); ?>">
            <input type="submit" name="submit" value="立即提交订单">
          </div>
        </form>
        <div style="clear:both;"></div>
      </div>
    </div>
    
    <!-- <h2>累积评价</h2>
    <div class="btn">
      <p><span style="font: 16px/24px Helvetica, Arial, san-serif; color: rgb(0, 0, 0); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; float: none; display: inline !important; white-space: normal; font-size-adjust: none; font-stretch: normal; background-color: rgb(249, 249, 249); -webkit-text-stroke-width: 0px;"></span></p>
      <p>支持30天无理由退换货！发现非正品，商家承担来回运费，<strong>真正“0”风险购物！</strong></p>
      <p></p>
    <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2278906920&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:2278906920:51" alt="QQ咨询" title="QQ咨询"/></a>
     <a class="btn" href="sms:18680224342">短信订购：18680224342</a>
    </div>
--> <article class="showcontent">
    <h2>订单查询</h2>
    <div class="btn">
      <p><span>输入订单号</span></p>
      <input name="orderSel" type="text" value="" /><input class="bnt_blue_2" type="button" name="button" value="查询该订单号">
       <div class="buyinfo">
        
      </div>
    </div>
  </article>
    
    <script src="/Public/<?php echo (C("projectName")); ?>/js/jquery-1.8.1.min.js"></script> 
    <script src="/Public/<?php echo (C("projectName")); ?>/js/time.lesser.js"></script> 
    <script language="javascript">addTimeLesser(1,131321);</script> 
    <script>
var not3chanpin=new Array("黑色加绒","黑色单皮");
var not3yanse=new Array();
var not3chima=new Array(" S/165"," M/170"," L/175"," XL/180"," XXL/185"," XXXL/190");
</script>
    <div id="fahuo"> 
      <script type="text/javascript" src="/Public/<?php echo (C("projectName")); ?>/js/fahuo.js"></script> 
    </div>
    <script type="text/javascript" src="/Public/<?php echo (C("projectName")); ?>/js/diqu.js"></script> 
    <script type="text/javascript" src="/Public/<?php echo (C("projectName")); ?>/js/not3.js"></script> 
    <!--订单--> 
    
  </article>
  <footer>
    <p></p>
    <center>
      沪ICP备14026694号-1 北京佐洛思服装有限公司
    </center>
  </footer>
</div>
<!--/page-->
<div class="display:none"> 
  <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1257122945'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1257122945' type='text/javascript'%3E%3C/script%3E"));</script> 
</div>
<nav>
  <ul class="Transverse">
    <li><a href="#buy"><strong>在线下单</strong></a></li>
    <li><a href="tel:13246891178"><strong>电话咨询</strong></a></li>
    <li><a href="sms:13246891178"><strong>短信订购</strong></a></li>
  </ul>
</nav>
</body>
</html>
<script src="/Public/<?php echo (C("projectName")); ?>/js/demo.js"></script>
<script src="/Public/<?php echo (C("projectName")); ?>/js/notorder.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    //加载属性集
    $(".spec").live("click",function(){
      var spec_id = $(this).val();
      var url = "<?php echo U('skuList');?>";
     // var sku_id = $("input[name='chicun']:checked").val();
     // alert(spec_id);
      $.post(url,{spec_id:spec_id},function(data){
        //alert(data['staus']);
        if(data['staus']==1){
          //alert(data['content']);
           $("#sku").html(data['content']);
        }else{
          alert("请求失败！");
        }
      });
    });
    //更改价格
    $(".sku input").live("click",function(){
       var mey = $(this).attr("alt");
       $(".price").val(parseInt(mey));
    });
    $(".alipayShow").live("click",function(){
      $(".know").css("display","");
    });
    $(".closeShow").live("click",function(){
      $(".know").css("display","none");
    });
    //选项卡切换
    $(".tabClick li").on("click",function(){
      $(".tabClick li").attr("class","");
      $(this).attr("class","cus");
      $(".showtabs").hide();
      $(".js_"+$(this).attr("id")).show(500);
    });
    //ajax加载评论
    $("#tabs2").on("click",function(){
      var id = $("input[name='id']").val();
      $.ajax({
          url: "<?php echo U('comment');?>",    //请求的url地址
          dataType: "html",   //返回格式为json
          async: true, //请求是否异步，默认为异步，这也是ajax重要特性
          data: { "id":id
          },
          type: "POST",   //请求方式
          beforeSend: function() {
                //请求前的处理
           },
          success: function(data) {
                //请求成功时处理
                 $(".js_tabs2").html(data);
          },
         complete: function(data) {
          //请求完成的处理
         },
         
         error: function() {
            //请求出错处理
             alert("Server exception!");
        }
       
      });
    });
        //订单查询
    $(".bnt_blue_2").on("click",function(){
       var orderSel = $("input[name='orderSel']").val();
       if(orderSel==''){
        alert("订单号不能为空！");
        return false;
       }
       $.ajax({
          url: "<?php echo U('orderSel');?>",    //请求的url地址
          dataType: "json",   //返回格式为json
          async: true, //请求是否异步，默认为异步，这也是ajax重要特性
          data: { "orderSel":orderSel
          },
          type: "POST",   //请求方式
          success: function(data) {
                //请求成功时处理
                if(data['staus']){
                  $(".buyinfo").html(data['content']);
                }else{
                  $(".buyinfo").html("<b>订单号不存在！</b>");
                }
          },
         error: function() {
            //请求出错处理
             alert("Server exception!");
        }
       
      });
    });
  });
</script>