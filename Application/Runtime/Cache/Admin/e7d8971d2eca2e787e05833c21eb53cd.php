<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>会员管理</title>
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
[class^="icon-"]:before, [class*=" icon-"]:before {

    color: red;
}
.tip {
	color: #A94442;
	margin-left: 10px;
}
form {
	position: relative;
}

.position input,.size input{
  margin-left: 10px;
  margin-top: 0px;
}
.exp{
  border: 0px solid #ccc;
  padding: 5px 0px 10px 0px;
}

.dxbox input{
    float: left;
    display: inline;
    overflow: hidden;
}
.dxbox label {
    margin-left: 0px;
    margin-right: 4px;
    cursor: pointer;
}
.tipb{
	top: 0em; 
	color: #A94442;
    margin-left: 10px;
}
#money{
	color:red;
	font-weight:bold;
	font-size:16px;
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
    <h1 class="page-title">User</h1>
  </div>
  <ul class="breadcrumb">
    <li><a href="#"><?php echo (C("projectName")); ?></a> <span class="divider">/</span></li>
    <li><a href="#">会员管理</a> <span class="divider">/</span></li>
    <li class="active">会员消费</li>
  </ul>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="well">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab">会员消费</a></li>
          <li><a href="#profile" data-toggle="tab">会员充值</a></li>
          <li><a href="#selectRule" data-toggle="tab">充值记录</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">
            <form id="tab" enctype="multipart/form-data" method="post">
              <span><label>【会员账号】</label></span>
             <input name="account" id="account" type="text" value="" class="input-xlarge" /><sup class="tip"></sup>
             <label>【消费金额】</label>
              <input name="money" id="money" type="text" value="" class="input-xlarge" />
			    <label>【消费类型】</label>
             <div class="dxbox">
              <input type="radio" class="" checked="checked" name="mtype" id="b1" value="0">
              <label for="b1"><img src="/Public/Admin/images/xjxf.gif"></label>
              <input type="radio" class="" name="mtype" id="b2" value="1">
              <label for="b2"><img src="/Public/Admin/images/zhxf.gif"><sup class="tipb"></sup></label>
            </div>
			
             <label>【消费密码】</label>
            <input name="name" id="name" type="password" value="" class="input-xlarge" />
              <div> 
                <!-- <button id="sub" class="btn btn-primary"><i class="icon-save"></i> Save</button> --> 
                <a href="#myModal" id="checkForm" data-toggle="modal" class="btn btn-primary">提 交</a> </div>
            </form>
            <b class="platUrl"></b>
          </div>
<!--切换卡-->
   <div class="tab-pane fade" id="profile">
        <div class="well">
        <table class="table">
          <thead>
            <tr>
              <th>I D</th>
              <th>平 台</th>
              <th>资 源</th>
              <th>资源尺寸</th>
              <th>广告名称</th>
              <th>下单总数</th>
              <th>生成时间</th>
             
              <th style="width: 50px;">操作</th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                
                <td class="titleVal"><?php echo ($vo["title"]); ?></td>
                <td><?php echo ($vo["type_name"]); ?></td>
                <td><?php echo ($vo["money"]); ?> <a href="#" class="mey i" id="<?php echo ($vo["id"]); ?>" rel="tooltipRight" title="<?php echo ($vo["register"]); ?>"><i class="icon-cog"></i></a></td>
                <td><?php echo ($vo["stock"]); ?> <a href="#" class="stock i" id="<?php echo ($vo["id"]); ?>" rel="tooltipRight" title="<?php echo ($vo["register"]); ?>"><i class="icon-cog"></i></a></td>
                <?php if(($vo['state']) == "1"): ?><td><span><a href="#">上 架</a></span></td>
                  <?php else: ?>
                  <td><span><a href="#">下 架</a></span></td><?php endif; ?>
                <td><?php echo (date("Y-m-d H:i:s",$vo["pubtime"])); ?></td>
                <?php if(empty($vo['register'])): ?><td><a href="#" class="noEmpty" id="<?php echo ($vo["id"]); ?>"><i class="icon-pencil"></i></a></td>
                  <?php else: ?>
                  <td><a href="#" class="noEmpty notext" id="<?php echo ($vo["id"]); ?>" rel="tooltipRight" title="<?php echo ($vo["register"]); ?>"><i class="icon-pencil"></i></a></td><?php endif; ?>
                <td><?php echo ($vo["ip"]); ?>&nbsp<a href="#" rel="tooltipRight" class="showIp" id="<?php echo ($vo["id"]); ?>" title="<?php echo (getIpAddr($vo["ip"])); ?>"><i class="icon-signal"></i></a></td>
              </tr><?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
      <div class="pagination">
        <ul>
          <?php echo ($page); ?>
        </ul>
      </div>
    </div>
<!--切换卡-->
<!--切换卡-->
   <div class="tab-pane fade" id="selectRule">
    <div><p><b id="ruleNum"></b></p></div>
        <input class="inp" id="ruleName" type="text"  maxlength="10" placeholder="输入规则名字" value="" />
        <input class="inp" id="startDate" type="text"  size="10" maxlength="10" onClick="new Calendar().show(this);" placeholder="起始日期" value=""/>
          到
        <input class="inp" id="endDate" type="text" size="10" maxlength="10"  onClick="new Calendar().show(this);" placeholder="结束日期" value="" />
       <div>
          <button id="subTime" class="btn btn-primary"><i class="icon-save"></i>查 询</button>
       </div>
       <br/>
       <div>
        <ul>
            <li>温馨提示：查询结果不包含回收站订单.</li>
        </ul>
       </div>
    </div>
<!--切换卡-->

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
               data-dismiss="modal" aria-hidden="true"> &times; </button>
        <h4 class="modal-title" id="myModalLabel"> 
          <!--弹出层标题--> 
          温馨提示 </h4>
      </div>
      <div class="modal-body modal-bodyTwo"> 
        <!--弹出层内容--> 
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal">关闭</button>
    </div>
  </div>
  <!-- /.modal-content --> 
</div>
<!-- /.modal --> 

<script src="/Public/Admin/lib/bootstrap/js/bootstrap.js"></script> 
<script src="/Public/Admin/lib/Calendar.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("[rel=tooltip]").tooltip();
			var url = "<?php echo U('seluser');?>";
			//查询会员
			$("#account").on("keyup",function(){
				var account  = $("#account").val();
				$.post(url,{account:account},function(data){
					if(!data['status']){
						$(".tip").html('<i class="icon-remove"></i>&nbsp会员不存在');
						$(".tipb").html('');
					}else{
						$(".tip").html('<i class="icon-ok"></i>&nbsp匹配成功');
						$(".tipb").html('￥&nbsp;剩余'+data['content']['money']+'元');
					}
				});
			});
			//提交消费
			$("#checkForm").on("click",function(){
				var account  = $("#account").val();
				var password  = $("#password").val();
				var money  = $("#money").val();
				var type = $("type").val();
				alert(account);
			});
    
     
         
      //查询规则次数
      $("#subTime").live("click",function(){
        var ruleName = $("#ruleName").val();
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();
        var url = "<?php echo U('selectRule');?>";
        if(ruleName==""){
          $("#ruleNum").text("规则名称不能为空.");
          return false;
        }
        if(startDate=="" || endDate==""){
          $("#ruleNum").text("起始日期或者结束日期不能为空.");
          return false;
        }
        if(startDate > endDate){
          $("#ruleNum").text("起始日期不能大于结束日期.");
          return false;
        }
        $.post(url,{ruleName:ruleName,startDate:startDate,endDate:endDate},function(data){
          $("#ruleNum").text(data);
        });
      });
			$.bShow = function(data,url){
				//弹出层样式 && 弹出内容
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