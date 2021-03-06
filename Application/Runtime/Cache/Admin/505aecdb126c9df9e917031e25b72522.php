<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>添加管理员</title>
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
		.s5{
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
            
            <h1 class="page-title">Add Position</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#"><?php echo (C("projectName")); ?></a> <span class="divider">/</span></li>
            <li><a href="#">权限模块</a> <span class="divider">/</span></li>
            <li class="active">新增职位</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">添加职位</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab">
		<label>职位名称</label>
        <input name="name" id="name" type="text" value="" class="input-xlarge" />
		<sup class="s5">*请给职位赋予职称</sup>
        <label>请赋予权限</label>
			<?php if(is_array($top)): foreach($top as $key=>$vo): if($vo['fid'] == 0): ?><dl> 
					<dt class="nav-header"><input id="top" class="t<?php echo ($vo["id"]); ?>" type="checkbox"  value="<?php echo ($vo["id"]); ?>" /><?php echo ($vo["name"]); ?></dt>
					<?php if(is_array($sub)): foreach($sub as $key=>$v): if($v['fid'] == $vo['id']): ?><dd><input id="son" class="t<?php echo ($vo["id"]); ?>" type="checkbox" value="<?php echo ($v["id"]); ?>" /><?php echo ($v["name"]); ?></dd><?php endif; endforeach; endif; ?>
				</dl><?php endif; endforeach; endif; ?>
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
				if(inpId=="name"){
					$(".s5").css("display","inline-block");
				}
			});
			$('input').blur(function(){
				var url    = "<?php echo U('Admin/ajaxForm','','');?>";
				var inpId  = $(this).attr('id');
				var inpVal = $(this).val();
				if(inpId=="name"){			
					$.post(url,{name:inpVal},function(data){								
						$(".s5").text(data["content"]);
					});	
				}			
				});
			$('#myModal').on('show.bs.modal', function () {
				var url        = "<?php echo U('Admin/handle','','');?>";
				var name	   = $("#name").val();
				if(name===""){
					$(".s5").css("display","inline-block").text("名字不能为空");
					return false;
				}
			});
			$('#ck').live("click",function(){
				var url = "<?php echo U('addGradeHandle');?>";
				var name = $("#name").val();
				var range = "";
				$('input:checkbox').each(function() {
					if($(this).attr("checked")){
						 range += $(this).val()+',';
					}
				});
				if(range == ""){
					$.bShow("很抱歉，您没有赋予职位任何权限！");	
				}else{
					$.post(url,{position:name,range:range},function(data){
						$.bShow(data['content']);
					});
				}	
			});
				

			
			$("#top").live("click",function(){
				var top = $(this).attr("class");
				var son = $("input[id='son']");
				if($(this).attr("checked")){
					//alert("全部选择");
					for(var i=0 ;i<son.length; i++) {
						if($(son[i]).attr("class")==top){
							son[i].checked = true;
						}
					}
				}else{
					//alert("全部取消");
					for(var i=0 ;i<son.length; i++) {
						if($(son[i]).attr("class")==top){
							son[i].checked = false;
						}
					}
				}
			});
			$("#son").live("click",function(){
				var son = $(this).attr("class");
				if($(this).attr("checked")){
					$("input[id='top']").each(function() {
					if($(this).attr("class") == son){
						$(this).attr("checked",true);
					}
					});
				}else{
					//alert("点击了取消");  //son 点击取消后需要执行动作
				}
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