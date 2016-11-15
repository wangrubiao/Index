<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>商品列表</title>
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
.checkPage a {
	color: red;
	background: red;
}
.pagenNo a {
	color: #ccc;
	pointer-events: none;
}
.infoNo a {
	color: #333333;
	pointer-events: none;
}
tr:hover {
	background: #F6F6F6;
}
.current {
	color: red;
}
/**模态框**/
#myMod .modal-body {
	height: 180px;
}
.btn-group {
	padding-bottom: 10px;
}
#modalStock,#modalMey{
	width: 300px;
}
.stockInput {
	width: 80px;
}
.i{
  color:#ccc;
}
.i:hover {
  display: inline-block;
  color:#5788D5;
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
    <h1 class="page-title">Order</h1>
  </div>
  <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li class="active">商品列表</li>
  </ul>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="btn-toolbar"> 
        <!--<button class="btn btn-primary"><i class="icon-plus"></i> 新 增</button>
    <button class="btn">Import</button>
    <button class="btn">历史成交<font color="red"><b><?php echo ($nowSum); ?></b></font>元&nbsp共<font color="red"><b><?php echo ($nowCount); ?></b></font>单&nbsp均价为<font color="red"><b><?php echo ($nowAvg); ?></b></font>元</button>-->
        <div class="btn-group"> </div>
      </div>
      <div class="well">
        <table class="table">
          <thead>
            <tr>
              <th>I D</th>
              <th>商品货号</th>
              <th>标 题</th>
              <th>分 类</th>
              <th>价 格</th>
              <th>库 存</th>
              <th>状 态</th>
              <th>时 间</th>
              <th>地 址</th>
              <th style="width: 50px;">操作</th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["goods_number"]); ?></td>
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
      <footer>
        <hr>
        <p class="pull-right">Collect from <a href="#" title="维新" target="_blank">维新</a></p>
        <p>&copy; 2015 <a href="#" target="_blank">Portnine</a></p>
      </footer>
    </div>
  </div>
</div>

<!--修改库存-->
<div class="modal small hide fade" id="modalStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">修改库存</h3>
  </div>
  <div class="modal-body"> 
    <!-- <p class="error-text"><i class="icon-question-sign modal-icon"></i>是否将订单移动到回收站?</p>-->
    <input name="goodsId" id="goodsId" type="hidden" value=""/>
    <ul class="list-group">
    </ul>
  </div>
  <div class="modal-footer">
    <button id="stockister" class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
    <button class="btn btn-danger" data-dismiss="modal">取消</button>
  </div>
</div>
<!--修改库存 end-->
<!--修改价格-->
<div class="modal small hide fade" id="modalMey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">修改价格</h3>
  </div>
  <div class="modal-body"> 
    <!-- <p class="error-text"><i class="icon-question-sign modal-icon"></i>是否将订单移动到回收站?</p>-->
    <input name="goodsIdMey" id="goodsIdMey" type="hidden" value=""/>
    <ul class="list-group-mey">
    </ul>
  </div>
  <div class="modal-footer">
    <button id="meyister" class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
    <button class="btn btn-danger" data-dismiss="modal">取消</button>
  </div>
</div>
<!--修改价格 end-->
<!--模态框提示-->
<div class="modal fade" id="myModala" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close refresh" 
               data-dismiss="modal" aria-hidden="true"> &times; </button>
        <h4 class="modal-title" id="myModalLabel"> Error </h4>
      </div>
      <div class="modal-body modal-bodyTwo"> 
        <!--弹出层内容--> 
      </div>
    </div>
  </div>
  <!-- /.modal-content --> 
</div>
<!--模态框提示 end -->
<script src="/Public/Admin/lib/bootstrap/js/bootstrap.js"></script> 
<script type="text/javascript">
       $(document).ready(function(){
			$("[rel=tooltip]").tooltip({
				placement:'left'
			});
      $("[rel=tooltipRight]").tooltip({
        placement:'right'
      });
      //alert库存模态框
      $(".stock").live("click",function(){
        var url = "<?php echo U('stockEdit');?>";
        var id = $(this).attr("id");
        $("#goodsId").val(id);
        $.post(url,{id:id},function(data){
          $(".list-group").html(data);
        });
        $("#modalStock").modal("show");
      });
      //alert库存模态框保存
      $("#stockister").live("click",function(){
        var url = "<?php echo U('stockEditCheck');?>";
        var id = $("#goodsId").val();
         var focus_input = $(".list-group input");
         var str = "{";
         focus_input.each(function(){
            str+= "'"+$(this).attr("id")+"':'"+$(this).val()+"',";
         });
         str+= "}";
         var jsonobj=eval('('+str+')');
         //alert(jsonobj);
        $.post(url,{id:id,val:jsonobj},function(data){
          if(data["status"]){
            $.bShow("保存成功");
          }else{
            $.bShow("保存失败");
          }
        });
      });
      //alert价格模态框
        $(".mey").live("click",function(){
        var url = "<?php echo U('moneyEdit');?>";
        var id = $(this).attr("id");
        $("#goodsIdMey").val(id);
        $.post(url,{id:id},function(data){
          $(".list-group-mey").html(data);
        });
        $("#modalMey").modal("show");
      });
      //alert价格模态框保存
      $("#meyister").live("click",function(){
        var url = "<?php echo U('moneyEditCheck');?>";
        var id = $("#goodsIdMey").val();
         var focus_input = $(".list-group-mey input");
         var str = "{";
         focus_input.each(function(){
            str+= "'"+$(this).attr("id")+"':'"+$(this).val()+"',";
         });
         str+= "}";
         var jsonobj=eval('('+str+')');
        $.post(url,{id:id,val:jsonobj},function(data){
          if(data["status"]){
            $.bShow("保存成功");
          }else{
            $.bShow("保存失败");
          }
        });
      });

       //该函数主要是当提示框提示完成确定后刷新
      $(".refresh").live("click",function(){
          location.reload();
      });
			$.bShow = function(data){
				//弹出层样式 && 弹出内容
				$(".modal-title").text("提示");
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