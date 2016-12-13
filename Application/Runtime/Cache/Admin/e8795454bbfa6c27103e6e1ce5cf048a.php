<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>生成推广URL</title>
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
    <h1 class="page-title">Add Shop</h1>
  </div>
  <ul class="breadcrumb">
    <li><a href="#"><?php echo (C("projectName")); ?></a> <span class="divider">/</span></li>
    <li><a href="#">推广模块</a> <span class="divider">/</span></li>
    <li class="active">生成推广URL</li>
  </ul>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="well">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab">生成URL</a></li>
          <li><a href="#profile" data-toggle="tab">URL记录</a></li>
          <li><a href="#selectRule" data-toggle="tab">规则转化</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">
            <form id="tab" enctype="multipart/form-data" method="post">
              <label>【推广平台】</label>
              <select name="platform" id="platform">
               <option value="0">未选择</option>
               <?php if(is_array($result)): foreach($result as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" data-platval="<?php echo ($vo["platval"]); ?>" ><?php echo ($vo["platname"]); ?></option><?php endforeach; endif; ?>
              </select>
             <label>【选择资源】</label>
              <div class="position exp">
                <p>未选择推广平台</p>
              </div>
             <label>【资源尺寸】</label>
              <div class="size exp">
                <p>未选择推广资源</p>
              </div>
              <label>【广告名称】</label>
              <input name="name" id="name" type="text" value="" class="input-xlarge" />
              <sup class="tip">*请保持名称的唯一性</sup>
              <?php if(is_array($top)): foreach($top as $key=>$vo): if($vo['fid'] == 0): ?><dl>
                    <dt class="nav-header">
                      <input id="top" class="t<?php echo ($vo["id"]); ?>" type="checkbox"  value="<?php echo ($vo["id"]); ?>" />
                      <?php echo ($vo["name"]); ?></dt>
                    <?php if(is_array($sub)): foreach($sub as $key=>$v): if($v['fid'] == $vo['id']): ?><dd>
                          <input id="son" class="t<?php echo ($vo["id"]); ?>" type="checkbox" value="<?php echo ($v["id"]); ?>" />
                          <?php echo ($v["name"]); ?></dd><?php endif; endforeach; endif; ?>
                  </dl><?php endif; endforeach; endif; ?>
              <div> 
                <!-- <button id="sub" class="btn btn-primary"><i class="icon-save"></i> Save</button> --> 
                <a href="#myModal" id="addUrl" data-toggle="modal" class="btn btn-primary">生成URL</a> </div>
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
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
      //加载资源平台资源
			$("#platform").live("click",function(){
         var url = "<?php echo U('handle');?>";
         var val = $(this).val();
        if(val!=0){
            //alert(val);
            $.post(url,{id:val},function(data){
                $(".position").html(data);
            });
         }
      });
      //加载资源位置
      $("input[name='resources']").live("click",function(){
        var val = $(this).val();
        var url = "<?php echo U('handleSize');?>";
         $.post(url,{id:val},function(data){
                $(".size").html(data);
          });
      });
      //生成Url
      $("#addUrl").live("click",function(){
          var platform = $("#platform");
          var resources = $("input[name='resources']:checked");
          var ressize = $("input[name='ressize']:checked");
          var name = $("#name").val();
          //alert(name+ressize.val());
          if(platform.val()=="0"){
            $.bShow("请选择推广平台","");
            return false;
          }
          if(resources.val()==null){
              $.bShow("请选择平台资源","");
              return false;
          }
          if(ressize.val()==null){
              $.bShow("请选择资源位置","");
              return false;
          }
          if(name==""){
             $.bShow("请输入广告名称","");
             return false;
          }
          //组合URL
          var str="http://";
              str+= $("#platform").find("option:selected").data("platval");
              str+=".huiket.com?id=1&g=";
              str+=name;
              //str+=ressize.attr("class");
          var url = "<?php echo U('generate');?>";
          $.post(url,{rule_name:name,size_id:ressize.val()},function(data){


              switch(data['status'])
              {
                case 1:
                 $(".platUrl").html("<font color='red'>广告名称已经存在</font>");
                break;
                case 2:
                 $(".platUrl").html("<font color='red'>名称只能为英文或数字组合</font>");
                break;
                 case 3:
                $(".platUrl").html("<font color='red'>长度不太健康,只能在5个字节</font>");
                break;
                default:
                $(".platUrl").text(str);
              }
              
          });
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