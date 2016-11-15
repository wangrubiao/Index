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
	width: 50%;
	height: 80px;
}
.edit-save{
  width: 30px;
  height: 20px;
  background: #5C98D2;
  padding: 5px 10px 5px 10px;
  color:#ffffff;
}
.edit-save:hover{
  color:#ffffff;
}
.editlist{
  display: none;
}
.pagination {
    height: 40px;
    margin: 5px 0;
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
    <li><a href="index.html">Fruits</a> <span class="divider">/</span></li>
    <li class="active">会员管理</li>
  </ul>
  <div class="container-fluid">

    <div class="row-fluid">
<div class="pagination">
        <ul>
          <?php echo ($page); ?>
        </ul>
      </div>
      <div class="well">
         <div>
          <input type="checkbox" />全选
          &nbsp;&nbsp;&nbsp;<a href="#"><span class="label label-info">批量管理</span></a>&nbsp;&nbsp;&nbsp;
        </div>
        <table class="table">
          <thead>
            <tr class="tr_top">
			 <th width="20"><div align="left">I D</div></th>
              <th width="90"><div align="left">会员号</div></th>
              <th width="50"><div align="left">金 额</div></th>
			   <th width="50"><div align="left">积 分</div></th>
              <th width="75"><div align="left">手机号码</div></th>
              <th width="90"><div align="left">注册日期</div></th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><!-- <tr class="order_top">
                <td colspan="11">&nbsp;&nbsp;
                  <input type="checkbox" />
                  &nbsp;订单号：<?php echo ($vo["order"]); ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;下单日期：<?php echo (date("Y-m-d H:i:s",$vo["order"])); ?></td>
              </tr>-->
              <tr class="order_bdy">
                <td width="20">&nbsp;<?php echo ($vo["id"]); ?></td>
                <td width="90"><!--<a href="/range/FruitsUser/../../?id=<?php echo ($vo["goods_id"]); ?>" target="_blank"><img class="zt" src="<?php echo ($vo["img_url"]); ?>" />--><span><?php echo ($vo["account"]); ?></span></a></td>
             
              <td class="edit edit-id-<?php echo ($vo["id"]); ?>" width="50">
                <p class="edit-adds-<?php echo ($vo["id"]); ?>"><?php echo ($vo["wechat"]); ?><p>
              </td>
			  <td class="edit edit-id-<?php echo ($vo["id"]); ?>" width="50">
                <p class="edit-adds-<?php echo ($vo["id"]); ?>"><?php echo ($vo["wechat"]); ?><p>
              </td>

               <td width="75"><span class="upTime-id-<?php echo ($vo["id"]); ?>"><?php echo ($vo["mob"]); ?></span>
               </td>
                  
                  
                <td width="90"><div><?php echo (date('Y-m-d h:i:s',$vo["pubtime"])); ?></div></td>
                
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
	
    </script>
</body>
</html>