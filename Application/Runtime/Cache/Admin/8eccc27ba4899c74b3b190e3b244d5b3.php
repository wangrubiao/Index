<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>订单列表</title>
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
.table {
	border: 1px #ccc solid;
}
.current {
	color: red;
}
.paystate {
	font-size: 12px;
	color: red;
}
.tr_top {
	background: #F9F9F9;
}
.order_top {
	background: #EAF8FF;
	padding-top: 10px;
}
.zt {
	float: left;
	margin-right: 5px;
	width: 55px;
	height: 55px;
	border: 1px solid #ccc;
}
em {
	display: block;
	font-style: normal;
	color: #9E9E9E;
}
input[type="checkbox"]{
  margin: 8px 3px;
}
.well{
  padding-top: 0px;
}
.label-info{
  border: 1px solid #ccc;
  background: #ffffff;
  color: #000000;
}
.label-info:hover{
  border: 1px red solid;
}
/**模态框**/
#myMod .modal-body {
	height: 180px;
}
.i5 {
	color: red;
}
.notext {
	color: red;
}
textarea{
	width: 90%;
	height: 150px;
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
    <li class="active">订单列表</li>
  </ul>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="btn-toolbar"> 
        <!--<button class="btn btn-primary"><i class="icon-plus"></i> 新 增</button>
    <button class="btn">Import</button>-->
        
        <button class="btn">今日 <img src="/Public/Admin/images/hdfk.gif" /> <font color="red"><b><?php echo ($csahSum); ?></b></font>元&nbsp/&nbsp<font color="red"><b><?php echo ($csahCount); ?></b></font>单
        &nbsp&nbsp<img src="/Public/Admin/images/zhifubao.gif" /><font color="red"><b><?php echo ($alipaySum); ?></b></font>元&nbsp/&nbsp<font color="red"><b><?php echo ($alipayCount); ?></b></font>单
        &nbsp&nbsp
        共<font color="red"><b><?php echo ($nowSum); ?></b></font>元&nbsp/&nbsp<font color="red"><b><?php echo ($nowCount); ?></b></font>单&nbsp/&nbsp均价<font color="red"><b><?php echo ($nowAvg); ?></b></font>元 </button>
        <div class="btn-group"> </div>
      </div>
      <div class="well">
         <div>
          <input type="checkbox" />全选
          &nbsp;&nbsp;&nbsp;<a href="#"><span class="label label-info">批量发货</span></a>&nbsp;&nbsp;&nbsp;
        </div>
        <table class="table">
          <thead>
            <tr class="tr_top">
              <th colspan="2"><div align="center">宝贝信息</div></th>
              <th width="72"><div align="left">单价(元)</div></th>
              <th width="75"><div align="left">实收款(元)</div></th>
              <th width="90"><div align="left">买 家</div></th>
              <th width="200"><div align="left">地 址</div></th>
              <th width="18"><div align="left">I P</div></th>
              <th width="38"><div align="left">下单位置</div></th>
              <th width="50"><div align="left">留 言</div></th>
              <th width="50"><div align="left">备 注</div></th>
              <th width="50" style="width: 50px;"><div align="left">操作</div></th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="order_top">
                <td colspan="11">&nbsp;&nbsp;
                  <input type="checkbox" />
                  &nbsp;订单号：<?php echo ($vo["order"]); ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;下单日期：<?php echo (date("Y-m-d H:i:s",$vo["order"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)"><span class="label label-info push-info" data-name="<?php echo ($vo["consignee"]); ?>" data-mob="<?php echo ($vo["mob"]); ?>">推送号码</span></a></td>
              </tr>
              <tr class="order_bdy">
                <td width="20">&nbsp;<?php echo ($vo["id"]); ?></td>
                <td width="230"><a href="/range/Order/../../?id=<?php echo ($vo["goods_id"]); ?>" target="_blank"><img class="zt" src="<?php echo ($vo["img_url"]); ?>" /><span><?php echo ($vo["order_title"]); ?></span></a><em><b>分类</b>：<?php echo ($vo["product"]); ?>&nbsp;&nbsp;<b>规格</b>：<?php echo ($vo["size"]); ?></em></td>
                <td width="72"><?php echo ($vo["mey"]); ?></td>
                <?php if(($vo["paytype"]) == "1"): if(($vo["paystate"]) == "1"): ?><td>￥<?php echo ($vo['mey']-($vo['mey']*$xsd)); ?>
                      <div><img src="/Public/Admin/images/zhifubao.gif"></div>
                      <spna class="paystate">
                      <b>(已付款)</b></span></td>
                    <?php else: ?>
                    <td><img src="/Public/Admin/images/zhifubao.gif">
                      <div class="paystate">(未支付)</div></td><?php endif; ?>
                  <?php else: ?>
                  <td><div align="left">￥<?php echo ($vo["mey"]); ?></div>
                    <img src="/Public/Admin/images/hdfk.gif"></td><?php endif; ?>
                <td><div><?php echo ($vo["consignee"]); ?></div>
                  <?php echo ($vo["mob"]); ?>&nbsp;<a href="javascript:void(0)" rel="tooltipRight" id="<?php echo ($vo["mob"]); echo ($vo["id"]); ?>" class="mobAddr" data-placement="right"><i class="icon-phone"></i></a></td>
                <td><?php echo ($vo["address"]); ?></td>
                <?php if(($vo['countip']) > "1"): ?><td width="102"><span><a href="javascript:void(0)"><font color="red">IP异常<?php echo ($vo["countip"]); ?>次</font></a></span>
                    <div> <?php echo ($vo["ip"]); ?>&nbsp<a href="javascript:void(0)" rel="tooltipRight" class="showIp" id="<?php echo ($vo["id"]); ?>" title="<?php echo (getIpAddr($vo["ip"])); ?>"><i class="icon-signal"></i></div>
                    </a></td>
                  <?php else: ?>
                  <td width="94">正 常
                    <div><?php echo ($vo["ip"]); ?>&nbsp<a href="javascript:void(0)" rel="tooltipRight" class="showIp" id="<?php echo ($vo["id"]); ?>" title="<?php echo (getIpAddr($vo["ip"])); ?>"><i class="icon-signal"></i></div>
                    </a></td><?php endif; ?>

                <?php if(($vo['position']) == "0"): ?><td><font color="red">参数为空</font></td>
                <?php else: ?>
                   <?php if(($vo['rule_name']) == ""): ?><td width="110">注入参数<div><font color="red"><?php echo ($vo["position"]); ?></font></div></td>
                  <?php else: ?>
                      <td width="110"><div><?php echo ($vo["platname"]); ?>_<?php echo ($vo["position"]); ?></div><?php echo ($vo["rsename"]); ?><div><?php echo ($vo["size_val"]); ?></div></td><?php endif; endif; ?>



                <?php if(empty($vo['guest'])): ?><td><a href="javascript:void(0)"><i class="icon-minus"></i></a></td>
                  <?php else: ?>
                  <td><a href="javascript:void(0)" rel="tooltip" class="show" id="<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["guest"]); ?>"><i class="icon-file"></i></a></td><?php endif; ?>

                <?php if(empty($vo['register'])): ?><td width="143"><a href="javascript:void(0)" class="noEmpty" id="<?php echo ($vo["id"]); ?>"><i class="icon-pencil"></i></a></td>
                  <?php else: ?>
                  <td width="18"><a href="javascript:void(0)" class="noEmpty notext" id="<?php echo ($vo["id"]); ?>" rel="tooltipRight" title="<?php echo ($vo["register"]); ?>"><i class="icon-pencil"></i></a></td><?php endif; ?>

                <td width="90"><a href="javascript:void(0)" class="checkOrder" id="<?php echo ($vo["id"]); ?>"><i class="icon-truck"></i></a> &nbsp;<a href="javascript:void(0)" class="checkTrash" id="<?php echo ($vo["id"]); ?>"><i class="icon-trash"></i></a>&nbsp; <a href="<?php echo U('orderPrint',array('id'=>$vo['id']));?>" target="_blank" class="#" id=""><i class="icon-print"></i></a></td>
              </tr><?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
      <div class="pagination">
        <ul>
          <?php echo ($page); ?>
        </ul>
      </div>
      <!--发货模态框-->
      <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">发货操作</h3>
        </div>
        <div class="modal-body"> 
          <!-- Single button --> 
          <!--选择快递-->
          <div class="btn-group">
            <select class="form-control">
              <option value="0">请选择发货快递</option>
              <?php if(is_array($express)): foreach($express as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["exp_name"]); ?></option><?php endforeach; endif; ?>
            </select>
          </div>
          <!--运单号输入框-->
          <div class="input-group">
            <input type="text" class="form-control" id="waybill" placeholder="输入运单号" aria-describedby="basic-addon1">
          </div>
           <div class="input-group">
           <!-- <input type="text" class="form-control" id="freight" placeholder="发货运费" aria-describedby="basic-addon1" onkeypress="if(!this.value.match(/^[\+\-]?\d*?\.?\d*?$/))this.value=this.t_value;else this.t_value=this.value;if(this.value.match(/^(?:[\+\-]?\d+(?:\.\d+)?)?$/))this.o_value=this.value" onkeyup="if(!this.value.match(/^[\+\-]?\d*?\.?\d*?$/))this.value=this.t_value;else this.t_value=this.value;if(this.value.match(/^(?:[\+\-]?\d+(?:\.\d+)?)?$/))this.o_value=this.value" onblur="if(!this.value.match(/^(?:[\+\-]?\d+(?:\.\d+)?|\.\d*?)?$/))this.value=this.o_value;else{if(this.value.match(/^\.\d+$/))this.value=0+this.value;if(this.value.match(/^\.$/))this.value=0;this.o_value=this.value}">-->
            是否推送？ &nbsp;&nbsp;&nbsp; Yes &nbsp;<input style="" type="radio" name="tsong" class="form-control" checked="checked" value="1">&nbsp;&nbsp;&nbsp;&nbsp;
             No&nbsp;<input type="radio" name="tsong" class="form-control" value="0">
          </div>
          <div class="btn-groupB">
          </div>
          <ul class="list-group">
            <li class="list-group-item" style="display:none;"><b>ID：</b><span class="i0"></span></li>
            <li class="list-group-item"><b>订单号：</b><span class="i1"></span></li>
            <li class="list-group-item"><b>收货人：</b><span class="i2"></span></li>
            <li class="list-group-item"><b>电  话：</b><span class="i3"></span></li>
            <li class="list-group-item"><b>地  址：</b><span class="i4"></span></li>
            <li class="list-group-item"><b>备  注：</b><span class="i5"></span></li>
          </ul>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger checkOk" id="btn-danger" data-dismiss="modal">确认发货</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
        </div>
      </div>
      <footer>
        <hr>
        <p class="pull-right">Collect from <a href="#" title="维新" target="_blank">维新</a></p>
        <p>&copy; 2015 <a href="#" target="_blank">Portnine</a></p>
      </footer>
    </div>
  </div>
</div>

<!--移动订单模态框-->
<div class="modal small hide fade" id="TrashModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Order Confirmation</h3>
  </div>
  <div class="modal-body">
    <p class="error-text"><i class="icon-question-sign modal-icon"></i>是否将订单移动到回收站?</p>
    <input name="trashorder" id="trashorder" type="hidden" value=""/>
  </div>
  <div class="modal-footer">
    <button id="trash" class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
    <button class="btn btn-danger" data-dismiss="modal">取消</button>
  </div>
</div>
<!--移动订单模态框 end--> 

<!--编辑订单备注信息-->
<div class="modal small hide fade" id="noEmpty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">登记订单备忘信息</h3>
  </div>
  <div class="modal-body"> 
    <!-- <p class="error-text"><i class="icon-question-sign modal-icon"></i>是否将订单移动到回收站?</p>-->
    <input name="textOrderId" id="textOrderId" type="hidden" value=""/>
    <textarea></textarea>
  </div>
  <div class="modal-footer">
    <button id="register" class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
    <button class="btn btn-danger" data-dismiss="modal">取消</button>
  </div>
</div>
<!--编辑订单备注信息 end-->

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
<!-- /.modal --> 

<script src="/Public/Admin/lib/bootstrap/js/bootstrap.js"></script> 
<script type="text/javascript">
       $(document).ready(function(){
			$("[rel=tooltip]").tooltip({
				placement:'left'
			});
      $("[rel=tooltipRight]").tooltip({
        placement:'right'
      });
      $('.demo-cancel-click').click(function(){
				return false;
			});

      //显示客户备注，当点击后执行
			$(".show").live("click",function(){
				var val = $(this).attr("id");
			});
      //首次点击发货操作
		$(".checkOrder").live("click",function(){
         var url = "<?php echo U('selectOrder');?>";
         var id = $(this).attr("id");
         //alert(id);
         $.post(url,{id:id},function(data){
            $(".i0").text(data[0]['id']);
            $(".i1").text(data[0]['order']);
            $(".i2").text(data[0]['consignee']);
            $(".i3").text(data[0]['mob']);
            $(".i4").text(data[0]['address']);
            $(".i5").text(data[0]['guest']);
            $(".btn-groupB").html(data[1]['gift']);
         });
         $("#myModal").modal("show");
			}); 
      //模态框后确认发货点击
      $(".checkOk").live("click",function(){
          var id      = $(".i0").text();
          var order      = $(".i1").text();
          var name      = $(".i2").text();
          var mob      = $(".i3").text();
          var express = $(".btn-group select").val();
          var gift = $(".btn-groupB select").val();
          var waybill = $("#waybill").val();
          var freight = $("#freight").val()
          var url     = "<?php echo U('checkOrder');?>";
          //alert(id);
          if(express=="0"){
            $.bShow("未选择发货快递");
            return false;
          }
          if(waybill==""){
            $.bShow("运单号不能为空");
            return false;
          }
          if(freight == ""){
            $.bShow("请填写发货运费");
            return false;
          }
          $.post(url,{id:id,order:order,name:name,mob:mob,express:express,waybill:waybill,freight:freight,gift:gift},function(data){
           // alert(data['status']);
            if(data['status']==2){
              $(".alert-info span").text("单号格式不正确");
              $.bShow("单号格式不正确");
              return false;
            }
            if(data['status']==3){
              $(".alert-info span").text("运费金额不正确");
              $.bShow("运费金额不正确");
              return false;
            }
            if(data['status']){
              $.bShow("订单发货成功");
              //location.reload();
              return false;
            }else{
              $.bShow("订单发货失败");
              return false;
            }
          }); 
      });
      //移动订单到回收站
      $(".checkTrash").live("click",function(){
         var id = $(this).attr("id");
         $("#trashorder").val(id);
        $("#TrashModal").modal("show");
      });
      //模态框确定移动订单到回收站
      $("#trash").live("click",function(){
          var url = "<?php echo U('trash');?>";
          var val = $("#trashorder").val();
          $.post(url,{id:val},function(data){
              if(data["status"]){
                  $.bShow("订单已成功移到回收站");
                  //location.reload();
              }else{
                $.bShow("订单移动失败");
              }
          });
      });
      //展开归属地tppltip
      $(".mobAddr").mouseover(function(){
         var url = "<?php echo U('cgetMob');?>";
         var mob = $(this).attr("id");
        $.post(url,{mob:mob},function(data){
          $("#"+mob).attr("data-original-title",data['centent']);
          $("#"+mob).tooltip('show')
        });
      });
      //鼠标移开关闭tppltip归属地
      $(".mobAddr").mouseout(function(){
        var mob = $(this).attr("id");
        $("#"+mob).tooltip('hide');
      });
      //编辑订单的备注
      $(".noEmpty").live("click",function(){
        var url = "<?php echo U('cgetNotes');?>";
        var id = $(this).attr("id");
        $("#textOrderId").val(id);
        $.post(url,{id:id},function(data){
          $("textarea").text(data);
        });
        $("#noEmpty").modal("show");
      });
      //模态框确定保存订单备注
      $("#register").live("click",function(){
        var url = "<?php echo U('cEditNotes');?>";
        var id = $("#textOrderId").val();
        var register = $("textarea").val();
        $.post(url,{id:id,register:register},function(data){
          if(data["status"]){
            $.bShow("保存成功");
          }else{
            $.bShow("保存失败");
          }
        });
      });
      //推送信息
      $(".push-info").live("click",function(){
        var url = "<?php echo U('pushInfo');?>";
        var name = $(this).data("name");
        var mob = $(this).data("mob");
         $.post(url,{name:name,mob:mob,type:0},function(data){
          if(data["status"]){
            $.bShow("推送成功");
          }else{
            $.bShow("推送失败");
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