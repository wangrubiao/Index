<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>管理员登陆</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/stylesheets/theme.css">
<link rel="stylesheet" href="/Public/Admin/lib/font-awesome/css/font-awesome.css">
<script src="/Public/Admin/lib/jquery-1.7.2.min.js" type="text/javascript"></script>

<!-- Demo page code -->

<style type="text/css">
#line-chart {
	height: 300px;
	width: 800px;
	margin: 0px auto;
	margin-top: 1em;
}
.brand {
	font-family: georgia, serif;
}
.brand .first {
	color: #ccc;
	font-style: italic;
}
.brand .second {
	color: #fff;
	font-weight: bold;
}
</style>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="/Public/Admin/lib/font-awesome/docs/assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/Public/Admin/lib/font-awesome/docs/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/Public/Admin/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Public/Admin/lib/font-awesome/docs/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/Public/Admin/lib/font-awesome/docs/assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="">
<!--<![endif]-->

<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav pull-right">
    </ul>
    <a class="brand" href="index.html"><span class="second">维新</span><span class="first">让微信从此简单</span> </a> </div>
</div>
<div class="row-fluid">
  <div class="dialog">
    <h1 align="center">微信公众号管理系统</h1>
    <div class="block">
      <p class="block-heading">Sign In</p>
      <div class="block-body">
        <form name="form" action="<?php echo U('Index/index','','');?>" method="post">
          <label>Username <a href="#" rel="tooltip" data-original-title="用户登陆账号" data-placement="right">?</a></label>
          <input type="text" class="span12 username" name="username">

          <label>Password <a href="#" rel="tooltip" data-original-title="用户登录密码" data-placement="right">?</a></label>
          <input type="password" class="span12 password" name="password">

          <!-- 
         <label>验证码<a href="#" rel="tooltip" data-original-title="验证码" data-placement="right">?</a></label>
         <input type="code" class="span12 code" name="code">
          <img src="<?php echo U('verify','','');?>" boder="0" style="margin-bottom:0px; _position:relative;" align="middle" onclick="this.src=&#39;<?php echo U('verify','','');?>?id=&#39; + Math.random();">
          -->

          <a href="index.html" class="btn btn-primary pull-right" id="subForm">登 陆</a>

          <label class="remember-me">
            <input type="checkbox">
            记住密码</label>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
    <p class="pull-right" style=""><a href="#" target="blank" id="identifier">Copyright©2015 Wangrubiao</a></p>
    <p><a href="reset-password.html" >密码忘记掉?</a></p>
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true"> &times; </button>
        <h4 class="modal-title" id="myModalLabel"> Error </h4>
      </div>
      <div class="modal-body"> 
        <!--弹出层内容--> 
      </div>
    </div>
  </div>
  <!-- /.modal-content --> 
</div>
<!-- /.modal --> 

<script src="/Public/Admin/lib/bootstrap/js/bootstrap.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){
		$("[rel=tooltip]").tooltip();
		$('.demo-cancel-click').click(function(){return false;});
		$('#subForm').click(function(){
			//提交登陆处理
			var username = $(".username").val();
			var password = $(".password").val();
			var url      = "<?php echo U('Handle');?>";
			if(username === "" || password === ""){
				$.bShow("账号或者密码为空");
				return false;
			}
			//响应Ajax
			$.post(url,{username:username,password:password},function(data){
				if(!data['status']){
					$.bShow(data['content']);
				}else{
					$("form").submit();
				}
					
				
			});
			return false;
		});
		$.bShow = function(data){
			//弹出层样式 && 弹出内容
			$(".modal").css({
    		width: 'auto',
    		'margin-left': function () {
      		return -($(this).width() / 2);
   			}
			});
			$(".modal-body").text(data);
			$(".modal").modal("show");
		};
	});
    </script>
</body>
</html>