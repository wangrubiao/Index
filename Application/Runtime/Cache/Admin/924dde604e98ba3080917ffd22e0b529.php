<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>已发货订单</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/stylesheets/theme.css">
<link rel="stylesheet" href="/Public/Admin/lib/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/stylesheets/change.css">
<script src="/Public/Admin/lib/jquery-1.7.2.min.js" type="text/javascript"></script>

<!-- Demo page code -->

<style type="text/css">
/**模态框**/

#myMod .modal-body {
	height: 180px;
}
.btn-group {
	padding-bottom: 10px;
}
.list-group-item {
	border-bottom: 1px solid #EEEEEE;
	padding: 3px 0px 3px 0px;
	font-size: 12px;
}
.notext {
	color: red;
}
textarea {
	width: 90%;
	height: 150px;
}
.paystate {
  font-size: 12px;
  color: red;
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
    <li class="active">已发货列表</li>
  </ul>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="btn-toolbar"> 
        <!--<button class="btn btn-primary"><i class="icon-plus"></i> 新 增</button>
    <button class="btn">Import</button>-->
        <button class="btn">历史支付运费<font color="red"><b><?php echo ($freightSum); ?></b></font>元&nbsp;/&nbsp;发出<font color="red"><b><?php echo ($nowCount); ?></b></font>单
        &nbsp;/&nbsp;平均运费<font color="red"><b><?php echo ($nowAvg); ?></b></font>元
        &nbsp;/&nbsp;签收<font color="red"><b><?php echo ($refused); ?></b></font>单
        &nbsp;/&nbsp;拒签<font color="red"><b><?php echo ($sign); ?></b></font>单
        </button>
        <div class="btn-group"> </div>
      </div>
      <div class="well">
        <div>
          <input id="selectAll" type="checkbox" />
          全选
          &nbsp;&nbsp;&nbsp;<a href="#"><span id="complete" class="label label-info sign">标记签收</span></a>
          &nbsp;&nbsp;&nbsp; <a href="#"><span id="refused" class="label label-info sign">标记拒签</span></a> &nbsp;&nbsp;&nbsp;
          <input type="checkbox" />
          仅显示未标记订单
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
               <th width="58"><div align="left">来 源</div></th>
              <th width="50"><div align="left">物 流</div></th>
              <th width="50"><div align="left">备 注</div></th>
              <th width="50" style="width: 50px;"><div align="left">操作</div></th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="order_top">
                <td colspan="11">&nbsp;&nbsp;
                  <input class="subcheck" type="checkbox" value="<?php echo ($vo["id"]); ?>" />
                  &nbsp;订单号：<?php echo ($vo["order"]); ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;下单日期：<?php echo (date("Y-m-d H:i:s",$vo["order"])); ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发货日期：<?php echo (date("Y-m-d H:i:s",$vo["sendtime"])); ?>
                </td>
              </tr>
              <tr class="order_bdy">
                <td width="20">&nbsp;<?php echo ($vo["id"]); ?></td>
               <td width="230"><a href="/range/Order/../../?id=<?php echo ($vo["goods_id"]); ?>" target="_blank"><img class="zt" src="<?php echo ($vo["img_url"]); ?>" /><span><?php echo ($vo["order_title"]); ?></span></a><em><b>分类</b>：<?php echo ($vo["product"]); ?>&nbsp;&nbsp;<b>规格</b>：<?php echo ($vo["size"]); ?></em></td>
                <td width="72"><?php echo ($vo["mey"]); ?></td>
                <?php if(($vo["paytype"]) == "1"): if(($vo["paystate"]) == "1"): ?><td>￥<?php echo ($vo['mey']-($vo['mey']*$xsd)); ?>
                      <div><img src="/Public/Admin/images/zhifubao.gif"></div>
                      <div class="paystate"><b>(已付款)</b></div>
                    </td>
                    <?php else: ?>
                    <td><img src="/Public/Admin/images/zhifubao.gif">
                      <div class="paystate">(未支付)</div></td><?php endif; ?>
                  <?php else: ?>
                  <td><div align="left">￥<?php echo ($vo["mey"]); ?></div>
                    <img src="/Public/Admin/images/hdfk.gif"></td><?php endif; ?>
                <?php if(empty($vo['guest'])): ?><td><div><?php echo ($vo["consignee"]); ?></div>
                    <?php echo ($vo["mob"]); ?>&nbsp;<a href="javascript:void(0)" rel="tooltipRight" id="<?php echo ($vo["mob"]); echo ($vo["id"]); ?>" class="mobAddr" data-placement="right"><i class="icon-phone"></i></a></td>
                  <?php else: ?>
                  <td><div><?php echo ($vo["consignee"]); ?>&nbsp;<a href="#" rel="tooltip" id="<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["guest"]); ?>"><i class="icon-file"></i></a></div>
                    <?php echo ($vo["mob"]); ?>&nbsp;<a href="javascript:void(0)" rel="tooltipRight" id="<?php echo ($vo["mob"]); echo ($vo["id"]); ?>" class="mobAddr" data-placement="right"><i class="icon-phone"></i></a></td><?php endif; ?>
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
                   <?php if(($vo['rule_name']) == ""): ?><td>注入参数<div><font color="red"><?php echo ($vo["position"]); ?></font></div></td>
                  <?php else: ?>
                      <td><div><?php echo ($vo["platname"]); ?>_<?php echo ($vo["position"]); ?></div><?php echo ($vo["rsename"]); ?><div><?php echo ($vo["size_val"]); ?></div></td><?php endif; endif; ?>


                <td><?php switch($vo['type']): case "3": echo ($vo["exp_name"]); ?><font color="red">(已签收)</font><?php break;?>
                    <?php case "4": echo ($vo["exp_name"]); ?><b><font color="red">(拒签)</font></b><?php break;?>
                    <?php default: echo ($vo["exp_name"]); ?><font color="#ccc">(运输中)</font><?php endswitch;?>
                  <div><?php echo ($vo["waybill"]); ?></div>
                  运费 ￥<?php echo ($vo["freight"]); ?> </td>
                <?php if(empty($vo['register'])): ?><td width="143"><a href="javascript:void(0)" class="noEmpty" id="<?php echo ($vo["id"]); ?>"><i class="icon-pencil"></i></a></td>
                  <?php else: ?>
                  <td width="18"><a href="javascript:void(0)" class="noEmpty notext" id="<?php echo ($vo["id"]); ?>" rel="tooltipRight" title="<?php echo ($vo["register"]); ?>"><i class="icon-pencil"></i></a></td><?php endif; ?>
                <td><a href="javascript:void(0)" class="checkOrder" id="<?php echo ($vo["id"]); ?>"><i class="icon-fullscreen"></i></a>&nbsp 
                  <!--<a href="#" class="checkTrash" id="<?php echo ($vo["id"]); ?>"><i class="icon-trash"></i></a>--></td>
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
          <h3 id="myModalLabel">物流信息</h3>
        </div>
        <div class="modal-body"> 
          <!-- Single button --> 
          <!--选择快递-->
          <div class="btn-group">
            <select class="form-control" disabled>
              <option class="express" value="0">正在查询...</option>
              </foreach>
            </select>
          </div>
          <!--运单号输入框-->
          <div class="input-group">
            <input type="text" class="form-control waybill" id="waybill" placeholder="正在查询..." aria-describedby="basic-addon1" disabled>
          </div>
          <ul class="list-group">
            <!--加载物流信息-->
          </ul>
        </div>
        <div class="modal-footer"> 
          <!--<button class="btn btn-danger checkOk" id="btn-danger" data-dismiss="modal">确认发货</button>-->
          <button class="btn" data-dismiss="modal" aria-hidden="true">确 定</button>
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
      
      <footer>
        <hr>
        <p class="pull-right">Collect from <a href="#" title="维新" target="_blank">维新</a></p>
        <p>&copy; 2015 <a href="javascript:void(0)" target="_blank">Portnine</a></p>
      </footer>
    </div>
  </div>
</div>

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
<script src="/Public/Admin/lib/change.js"></script> 
<script type="text/javascript">
      $(document).ready(function(){
			$("[rel=tooltip]").tooltip({
				placement:'top'
			});
      $("[rel=tooltipRight]").tooltip({
        placement:'right'
      });
    //点击查看物流模态框
		$(".checkOrder").live("click",function(){
         var url = "<?php echo U('logisticsB');?>";
         var id = $(this).attr("id");
         $.post(url,{id:id},function(data){
            $(".express").text(data['express']);
            $(".waybill").val(data['waybill']);
            $(".list-group").html(data['str']);
            $(".list-group li:eq(0)").css({"color":"red","font-weight":"bold"});
         });
         $("#myModal").modal("show");
			});
     //加载订单备注信息编辑模态框
      $(".noEmpty").live("click",function(){
        var url = "<?php echo U('cgetNotes');?>";
        var id = $(this).attr("id");
        $("#textOrderId").val(id);
        //alert(data);
        $.post(url,{id:id},function(data){
          $("textarea").text(data);
        });
        $("#noEmpty").modal("show");
      });
      //编辑订单备注信息
      $("#register").live("click",function(){
        var url = "<?php echo U('cEditNotes');?>";
        var id = $("#textOrderId").val();
        var register = $("textarea").val();
        $.post(url,{id:id,register:register},function(data){
          if(data["status"]){
            $.bShow("保存成功","2000");
          }else{
            $.bShow("保存失败","");
          }
        });
      });
    //标记订单状态
    $(".sign").live("click",function(){
      var checkedsub = $("input[type='checkbox'][class='subcheck']:checked").length;//获取选中的subcheck的个数
      var orderArr = new Array();
      var url = "<?php echo U('orderBatch');?>";
      $("input[type='checkbox'][class='subcheck']:checked").each(function(index){
          orderArr[index] = $(this).val();
      });
      //alert(orderArr);
      if(checkedsub <= 0){
        $.bShow("未选择订单","");
        return false;
      }
      if($(this).attr("id") == "refused"){
        $.post(url,{orderArr:orderArr,type:4},function(data){
          $.bShow(data,"");
        });
      }else if($(this).attr("id") == "complete"){
        $.post(url,{orderArr:orderArr,type:3},function(data){
          $.bShow(data,"");
        });
      }else{
        $.bShow("State error!","");
      }
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
//关闭归属地tppltip
$(".mobAddr").mouseout(function(){
  var mob = $(this).attr("id");
  $("#"+mob).tooltip('hide');
});
    });	
    </script>
</body>
</html>