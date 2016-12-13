<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>用户登录</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="renderer" content="webkit">
<link href="/Public/<?php echo (C("projectName")); ?>/style/login.css" media="screen" rel="stylesheet" type="text/css">
</head>
<body>
<div class="top_head"> <a href="#" target="_blank">
  <img src="/Public/<?php echo (C("projectName")); ?>/images/new_logo4_71687.png"></a>
  <p class="ok_re">还没有账号？<a href="#" target="_blank">立即注册</a></p>
</div>
<div class="tao_r" data-username="login" style="overflow: visible;">
  <div class="left">
    <div id="ppLogin"></div>
    <div class="login_mid">
      <form method="post" action="<?php echo U('User/index');?>" name="loginform">
        <h3 class="hwid2">
          <input type="radio" name="loginppr" id="loginppr" checked="checked" value="0">
          <label>用户账号登录 &nbsp;&nbsp;&nbsp;</label>
          <input type="radio" class="phonecode" name="loginppr" id="phonecode" value="1">
          <label class="phonecode">手机动态码登录</label>
        </h3>
        <ul>
          <li class="username-and-password valueone valuetwo">
            <div class="user_name"></div>
            <div class="user_keywords"></div>
            <input value="邮箱/手机号/用户名" title="邮箱/手机号/用户名" data-mobile-placeholder="邮箱/手机号/用户名" onfocus="this.value==this.title?this.value='':null" onblur="this.value==''?this.value=this.title:null" type="text" autocomplete="off" disableautocomplete="" class="t" id="account" name="account" >
            <input value="" title="请输入密码" data-mobile-placeholder="请输入密码" class="t" id="password" type="password" autocomplete="off" disableautocomplete="">
          </li>
          <li id="phone_img_captcha_box" style="display: list-item;" class="captcha_box_new token" data-allow-captcha="yes">
            <input class="" type="text" name="captcha_img" value="验证码" title="验证码" onfocus="this.value==this.title?this.value='':null" onblur="this.value==''?this.value=this.title:null" autocomplete="off" disableautocomplete="" id="code">
            <img class="captcha-img captchaImg" src="http://z4.tuanimg.com/imagev2/site/80x32.70a06bf7e011179e0a25b71d46115048.jpg"><span class="changeImg">换一张</span> </li>
        </ul>
        <label class="verification_code" style="display:none;"><div class="error" id="pperrmsg"></div></label>
        <label>
          <input type="button" value="" name="commit" class="b" id="login_submit">
          <a target="_blank" class="forget_num" href="https://passport.zhe800.com/users/password/new">忘记密码？</a> </label>
      </form>
      <div class="othlogin">
        <h2>还可以使用这些账号登陆：</h2>
        <p><a class="qq" href="#"></a><a class="baidu" href="#"></a><a class="morel"><span>更多</span><span class="moreicon"></span></a></p>
        <!--<p class="more_login"> <a class="sina" href="#"></a> <a class="renren" href="#"></a> <a class="taobao" href="#"></a> </p>-->
      </div>
    </div>
  </div>
  <div class="right">
    <div class="right_b_bg"> <a href="#" title="" target="_blank"><img src="http://z3.tuanimg.com/imagev2/site/460x330.97dd786acab39e344e66efb7dd097d41.gif" alt=""></a> </div>
  </div>
</div>
<div class="foot-con">
  <div class="area footer"> <a rel="nofollow" target="_blank" href="http://www.miibeian.gov.cn/" style="display:inline; width:auto;">京ICP证120075号</a> 京ICP备10051110号-5 <a rel="nofollow" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010502025623" style="display:inline; width:auto;">京公网安备11010502025623</a> 营业执照110105013673175 食品流通许可证SP1101051510352397 Copyright©2011-2015 版权所有 ZHE800.COM <br>
    <div class="foot_center"> <a rel="nofollow" class="wxrz" href="http://www.itrust.org.cn/yz/pjwx.asp?wm=3571298269" target="_blank" style="float: left;"> <span class="wxrz_img"></span> 
      <!--  <img src="http://z0.tuanimg.com/v1/2012/images/web_trust.png" width="70" height="26" /> --> 
      </a> <a rel="nofollow" id="___szfw_logo___" class="cxwz" href="https://search.szfw.org/cert/l/CX20150121006886006587" style="float: left;" target="_blank"> <span class="cxwz_img"></span> 
      <!-- <img src="http://z0.tuanimg.com/v2/global/img/cert.jpg" width="70" height="26"> --> 
      </a> <a rel="nofollow" class="kxwz" href="https://ss.knet.cn/verifyseal.dll?sn=e150522110105588321uva000000&ct=df&a=1&pa=0.07444781064987183" target="_blank" style="float: left;"> <span class="kxwz_img"></span> 
      <!-- <img src="http://z5.tuanimg.com/v2/subject/footer/credit.png" width="70" height="26" /> --> 
      </a> </div>
  </div>
</div>
</body>
</html>
<script src="/Public/<?php echo (C("projectName")); ?>/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
  $("#login_submit").click(function(){
      var account = $("#account").val();
      var password = $("#password").val();
      var code = $("#code").val();
      var error = $(".error");
      if(account == "邮箱/手机号/用户名" || account == ""){
        $(".verification_code").attr("style","");
        error.text("用户名不能为空");
        return false;
      }
      if(password == ""){
        $(".verification_code").attr("style","");
        error.text("密码不能为空");
        return false;
      }
      $.ajax({
          url: "<?php echo U('login');?>",    //请求的url地址
          dataType: "json",   //返回格式为json
          async: true, //请求是否异步，默认为异步，这也是ajax重要特性
          data: { "account":account,
                  "password":password 
                },
          type: "POST",   //请求方式
          beforeSend: function() {
                //请求前的处理
           },
          success: function(data) {
                //请求成功时处理
                 if(!data['status']){
                    $(".verification_code").attr("style","");
                    error.text(data['content']);
                 }else{
                    $("form").submit();
                 }
          },
         complete: function(data) {
          //请求完成的处理
           //$("form").submit();
           if(data['status']==200){
              //alert("请求完成");
           }else{
              //alert("请求失败了！请查原因！");
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