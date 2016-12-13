<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>水果摊-绿色水果</title>
<meta name="viewport" content="minimal-ui,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no">
<meta name="msapplication-tap-highlight" content="no">
<meta name="tp_page" content="5123.0">
<link type="text/css" rel="stylesheet" href="/Public/<?php echo (C("projectName")); ?>/css/style-m-2.0.css">
<link type="text/css" rel="stylesheet" href="/Public/<?php echo (C("projectName")); ?>/css/login-m-2.0.css">
<link type="text/css" rel="stylesheet" href="/Public/<?php echo (C("projectName")); ?>/css/popup.css">
<script src="/Public/Library/jquery-1.9.1/jquery.min.js"></script>
<script src="/Public/Library/layer.mobile-v1.7/layer.js"></script>
<style type="text/css">
.layermcont {
    padding: 10px 15px;
    line-height: 22px;
    text-align: center;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('#login-btn').on('click', function(){
		var account = $('#touchweb_form-username').val();
		var password = $('#touchweb_form-password').val();
		var url = '<?php echo U("Login/handle");?>';
		if(account == ''){
			layer.open({
				style: 'border:none; background-color:rgba(0,0,0,0.6); color:#fff;',
				content:'登陆账号不能为空',
				time:3,
				shade:false
			})
		}else if(password == ''){
			layer.open({
				style: 'border:none; background-color:rgba(0,0,0,0.6); color:#fff;',
				content:'登陆密码不能为空',
				time:3,
				shade:false
			})
		}else{
			//login
			$.post(url,{account:account,password:password},function(data){
				if(!data['status']){
					layer.open({
						style: 'border:none; background-color:rgba(0,0,0,0.6); color:#fff;',
						content:data['content'],
						time:3,
						shade:false
					})
				}else{
					//ok
					location.href = 'Index/index';
				}
			});
			
		}
	});
});
</script>

</head>
<body>
<div id="container">
  <div class="touchweb-com_header "> 
    
    <!-- left start --> 
    <a id="back" href="javascript: void(0);" class="left icon-back"></a> 
    <!-- left end --> 

    <!-- title start -->
    <h1>水果摊会员</h1>
    <!-- title end --> 
    
    <!-- right start --> 
    <!-- activeClass:js的相关class(screening筛选的jsclass); class:普通class(按钮:rbtn_box；省略号:icon-more) -->
    <div class="rightBox"> <a id="register_btn" href="javascript: void(0);" class="right rbtn"> 注册 </a> </div>
    <!-- 下拉 start --> 
    
    <!-- 下拉 end --> 
    <!-- right end --> 
    
  </div>
  <div class="touchweb_page-login"> 
    <!--
	<div id="error_tips" class="error_tips" style="display: block;">
            <span class="icon-warning icon_warning"></span>
            提示信息
    </div>
    -->
    <div class="login_box">
      <div class="form_item">
        <label class="icon-my" for="touchweb_form-username"></label>
        <div class="input_box">
          <input type="text" id="touchweb_form-username" placeholder="邮箱/手机/用户名" >
          <span class="icon_delete icon-delete"></span> </div>
      </div>
      <div class="form_item">
        <label class="icon-password" for="touchweb_form-password"></label>
        <div class="input_box">
          <input type="password" id="touchweb_form-password" placeholder="请输入密码">
          <span class="icon_delete icon-delete"></span> </div>
      </div>
    </div>
    <div class="form_box form_verification none">
      <div class="form_item">
        <div class="input_box">
          <input id="validateSig" type="hidden">
          <input id="register_form-phone-verification" class="text_verification" type="text" placeholder="请输入验证码" maxlength="4">
          <img class="pic_verification" alt="" width="105" height="43"> <span class="icon_refresh icon-refresh"></span> </div>
      </div>
    </div>
    <div class="remember_login">
      <input id="touchweb_form-checkbox" type="checkbox" checked="">
      <label for="touchweb_form-checkbox">两周内记住登录</label>
      <a href="javascript: void(0);" class="forgot_password">忘记密码？</a> </div>
    <div class="login_btn"> <a id="login-btn" href="javascript: void(0);" class="btn">登录</a> </div>
    <div class="joint_login">
      <h2><span>版权所有©水果摊</span></h2>
      <!--<ul>
        <li style="width: 33.33%;"> <a href="javascript: void(0);" class="icon-alipay"></a> </li>
        <li style="width: 33.33%;"> <a href="javascript: void(0);" class="icon-weibo"></a> </li>
        <li style="width: 33.33%;"> <a href="javascript: void(0);" class="icon-qq"></a> </li>
      </ul>-->
    </div>
  </div>
</div>

<div id="pop" class="touchweb_com-modPopup" style="display: none;">
  <div class="popup_box">
    <div class="popup_title" style="font-size: 10px;">客官，您的密码可能有安全风险哦~</div>
    <div class="popup_con" style="font-size: 10px;">建议您马上修改</div>
    <div class="popup_btn"> <a id="to_update_password" href="javascript: void();" class="continue" style="font-size: 10px;" onclick="">速速修改</a> <a id="to_ignore_to_update_password" href="javascript: void();" class="ignore" style="font-size: 10px;" onclick="">残忍忽略</a> </div>
  </div>
  <div class="popup_bg" style="bottom: 0px; right: 0px;"></div>
</div>

</body>
</html>