<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
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
		.checkPage a{
			color:red;
			background:red;
		}
		.pagenNo a{
			color:#ccc;
			pointer-events: none;
		}
		.infoNo a{
			color:#333333;
			pointer-events: none;
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
            
            <h1 class="page-title">Users</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">管理员列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> 新 增</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>账 号</th>
          <th>姓 名</th>
		  <th>职 位</th>
		  <th>状 态</th>
          <th>上次登录</th>
          <th style="width: 50px;">操作</th>
        </tr>
      </thead>
      <tbody>
		<?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
		  <td><?php echo ($vo["id"]); ?></td>
          <td><?php echo ($vo["username"]); ?></td>
          <td><?php echo ($vo["name"]); ?></td>
          <td><?php echo ($vo["position"]); ?></td>
		  <?php if(($vo["state"]) == "1"): ?><td><a href="#" rel="tooltip" class="recovery" id="<?php echo ($vo["username"]); ?>" title="恢复账号?"><i class="icon-play"></i></a></td>
		  <?php else: ?>
			<td><a href="#" rel="tooltip" class="frozen" id="<?php echo ($vo["username"]); ?>" title="冻结账号?"><i class="icon-pause"></i></a></td><?php endif; ?>
		  
		   <?php if(empty($vo["lasttime"])): ?><td>从未登录</td>
			<?php else: ?> 
			<td><?php echo (date("Y-m-d h:i:s",$vo["lasttime"])); ?></td><?php endif; ?> 
          <td>
              <a href="#"><i class="icon-pencil"></i></a>&nbsp
              <a href="#myModal" class="checkYes" role="button" data-toggle="modal" title="<?php echo ($vo["id"]); ?>"><i class="icon-remove"></i></a>
          </td>
        </tr><?php endforeach; endif; ?>
      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
        <li class="pagenNo"><a href="#">Prev</a></li>
		 <li class="checkPage"><a href="#">1</a></li>
		  <li><a href="#">2</a></li>
		   <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
			 <li><a href="#">5</a></li>
			 <li><a href="#">...</a></li>
        <li><a href="#">Next</a></li>
		<li class="thisPage infoNo"><a href="#" id="p_1">当前第1页</a></li>
		<li class="infoNo"><a href="#">共<?php echo ($pageCount); ?>页</a></li>
    </ul>
	<!--<ul>
        <li><a href="#">Prev</a></li>
        <li class="thover"><a href="#">1</a></li>
        <li><a href="#" >2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
		<li><a href="#">当前第一页</a></li>
    </ul>-->
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">温馨提示</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-question-sign modal-icon"></i>确定永远删除该管理员吗？</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="btn-danger" data-dismiss="modal">Yes</button>
        <button class="btn" id="checkNo" data-dismiss="modal" aria-hidden="true">No</button>
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
               Error
            </h4>
         </div>
         <div class="modal-body modal-bodyTwo">
          <!--弹出层内容-->
         </div>
    </div>    
      </div><!-- /.modal-content -->
</div><!-- /.modal -->

    <script src="/Public/Admin/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
			$("[rel=tooltip]").tooltip({
				placement:'left'
			});
            $('.demo-cancel-click').click(function(){
				return false;
			});
			var url = "<?php echo U('userState'),'','';?>";
			$(".recovery").live("click",function(){
				var val = $(this).attr("id");
				$(this).html('<i class="icon-pause"></li>');
				$(this).attr({"class":"frozen","data-original-title":"冻结账号?"});
				$.post(url,{username:val,ustate:0},function(data){
					if(data["status"]){
						//$.bShow("账号解冻成功");
					}
				});
			});
			$(".frozen").live("click",function(){
				var val = $(this).attr("id");
				$(this).html('<i class="icon-play"></i>');
				$(this).attr({"class":"recovery","data-original-title":"恢复账号?"});
				$.post(url,{username:val,ustate:1},function(data){
					if(data["status"]){
						//$.bShow("账号冻结成功");
					}
				});
			});
			$('.checkYes').live("click",function(){
				//处理删除请求
				var url = "<?php echo U('userDele');?>";
				var id  = $(this).attr('title');
				//alert(id);
				$("#myModal").modal("show");
				$(".btn-danger").unbind("click").click(function(){
					$.post(url,{id:id},function(data){
						if(data["status"]){
						$.bShow(data["content"]);
						location.reload();
						}else{
						$.bShow(data["content"]);
						}
					});
				});		
				return false;
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
			//ajax分页
			$(".pagination li").live("click",function(){
				var typePage     = $(this).text();
				var thisPage = $(".thisPage a").attr("id");
				var url  = "<?php echo U('ajaxPage');?>";
				$.post(url,{thisPage:thisPage,typePage:typePage},function(data){
					if(data["status"]){
					//alert(data['aaa']);
						$("tbody").html(data['content']);
						$(".pagination ul").html(data['page']);
					}
				});
				$(this).attr("class","checkPage");
			});
        });
		
		
    </script>
    
  </body>
</html>