<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>添加职位</title>
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
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
		.s1,.s2,.s3,.s4,.s5{
		color:#A94442;
		display:none;
		margin-left:10px;
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
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Add User</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#">Admin</a> <span class="divider">/</span></li>
            <li><a href="#">会员模块</a> <span class="divider">/</span></li>
            <li class="active">新增管理员</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">添加管理员</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab">
        <label>登陆账号</label>
        <input name="username" id="username" type="text" value="" class="input-xlarge" />
		<sup class="s1">请使用英文或者数字组合</sup>
        <label>登陆密码</label>
        <input name="password" id="password" type="password" value="" class="input-xlarge" />
		<sup class="s2">*建议使用8位数以上的数字或字母</sup>
        <label>确认密码</label>
        <input name="repassword" id="repassword" type="password" value="" class="input-xlarge" />
		<sup class="s3">*请再次输入密码</sup>
        <label>联系邮箱</label>
        <input name="mailbox" id="mailbox" type="text" value="" class="input-xlarge" />
		<sup class="s4">*忘记密码可通过邮箱找回</sup>
		<label>姓 名</label>
        <input name="name" id="name" type="text" value="" class="input-xlarge" />
		<sup class="s5">*请输入管理员的名字</sup>
        <label>选择职位</label>
        <select name="grade" id="grade" class="input-xlarge">
		  <option value="0">未选择(必须选择其中一个权限)</option>
          <option value="1">超级管理员(默认拥有全部权限)</option>
          <option value="2">普通管理员(可自行赋予权限)</option>
          <option value="3">普通客服(可自行赋予权限)</option>
		  
		</select>
		 <div>
			<!-- <button id="sub" class="btn btn-primary"><i class="icon-save"></i> Save</button> -->
			<a href="#myModal" data-toggle="modal" class="btn btn-primary">确 定</a>
        </div>
    </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-question-sign modal-icon"></i>您确定添加该管理员吗?</p>
  </div>
  <div class="modal-footer">
    <button id="ck" class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
    <button class="btn btn-danger" data-dismiss="modal">取消</button>
  </div>
</div>


                    
                    <footer>
                        <hr>

                        
                        <p class="pull-right">Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>

                        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
	
    <div class="modal fade" id="myModala" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               <!--弹出层标题-->
			   温馨提示
            </h4>
         </div>
         <div class="modal-body modal-bodyTwo">
          <!--弹出层内容-->
         </div>
    </div>    
	 <div class="modal-footer">
		<button class="btn" data-dismiss="modal">关闭</button>
  </div>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->


    <script src="/Public/Admin/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
			$('input').focus(function(){
				var inpId = $(this).attr('id');
				if(inpId=="username"){
					$(".s1").css("display","inline-block");
				}
				if(inpId=="password"){
					$(".s2").css("display","inline-block");
				}
				if(inpId=="repassword"){
					$(".s3").css("display","inline-block");
				}
				if(inpId=="mailbox"){
					$(".s4").css("display","inline-block");
				}
				if(inpId=="name"){
					$(".s5").css("display","inline-block");
				}
			});
			$('input').blur(function(){
				var url    = "<?php echo U('Admin/ajaxForm','','');?>";
				var inpId  = $(this).attr('id');
				var inpVal = $(this).val();
				if(inpId=="username"){
					$.post(url,{username:inpVal},function(data){
						$(".s1").text(data["content"]);
					});
				}
				if(inpId=="password"){			
					$.post(url,{password:inpVal},function(data){								
						$(".s2").text(data["content"]);
					});	
				}
				if(inpId=="repassword"){		
					var password = $("#password").val();
					$.post(url,{repassword:inpVal,password:password},function(data){						
						$(".s3").text(data["content"]);
					});	
				}
				if(inpId=="mailbox"){			
					$.post(url,{mailbox:inpVal},function(data){								
						$(".s4").text(data["content"]);
					});	
				}				
				if(inpId=="name"){			
					$.post(url,{name:inpVal},function(data){								
						$(".s5").text(data["content"]);
					});	
				}			
				});
			
			$('#myModal').on('show.bs.modal', function () {
				var url        = "<?php echo U('Admin/handle','','');?>";
				var username   = $("#username").val();
				var password   = $("#password").val();
				var repassword = $("#repassword").val();
				var mailbox	   = $("#mailbox").val();
				var name	   = $("#name").val();
				var grade	   = $("#grade").val();

				if(username===""){
					$(".s1").css("display","inline-block").text("账号不能为空");
					return false;
				}
				if(password===""){
					$(".s2").css("display","inline-block").text("密码不能为空");
					return false;
				}
				if(repassword===""){
					$(".s3").css("display","inline-block").text("确认密码不能为空");
					return false;
				}
				if(password!=repassword){
					$(".s3").css("display","inline-block").text("两次密码不匹配");
					return false;
				}
				if(mailbox===""){
					$(".s4").css("display","inline-block").text("邮箱不能为空");
					return false;
				}
				if(name===""){
					$(".s5").css("display","inline-block").text("名字不能为空");
					return false;
				}
				if(grade==="0"){
					$.bShow("请给管理员选择职位");
					return false;
				}
			});
			
			$('#ck').click(function(){
				var url        = "<?php echo U('Admin/handle','','');?>";
				var username   = $("#username").val();
				var password   = $("#password").val();
				var repassword = $("#repassword").val();
				var mailbox	   = $("#mailbox").val();
				var name	   = $("#name").val();
				var grade	   = $("#grade").val();
				$.post(url,{username:username,password:password,repassword:repassword,grade:grade,mailbox:mailbox,name:name},function(data){
					if(data["status"]){
						$.bShow(data["content"]);
					}else{
						$.bShow(data["content"]);
						return false;
					}
				});
			});	
			
			$.bShow = function(data,url){
				//弹出层样式 && 弹出内容
				//alert(url);
				$("#myModala").css({
					width: 'auto',
					'margin-left': function () {
					return -($(this).width() / 2);
					}
				});
				$(".modal-bodyTwo").text(data);
				$("#myModala").modal("show");
			};
		});
        
    </script>
    
  </body>
</html>