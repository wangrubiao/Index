/************
后期编写的js扩展
*************/
//禁止右击页面
$(document).bind("contextmenu",function(e){
	return false;
});
//全选 取消全选
$("#selectAll").live("click",function(){
	if ($("#selectAll").attr("checked")) {  
		$(".subcheck").attr("checked", true);  
	}else{  
		$(".subcheck").attr("checked", false);  
	}  
}); 
//子选择
$(".subcheck").live("click",function(){
	if (!$(".subcheck").checked) {  
		$("#selectAll").attr("checked", false);  
	}
	var chsub = $("input[type='checkbox'][class='subcheck']").length; //获取subcheck的个数  
	var checkedsub = $("input[type='checkbox'][class='subcheck']:checked").length; //获取选中的subcheck的个数  
	if (checkedsub == chsub) {  
		$("#selectAll").attr("checked", true);  
	}  
});
//弹出层样式 && 弹出内容
$.bShow = function(data,time){
	$(".modal-title").text("提示");
	$("#myModala").css({
		width: 'auto',
		'margin-left': function () {
		return -($(this).width() / 2);
		}
	});
	if(time==""){
		$(".modal-bodyTwo").text(data);
		$("#myModala").modal("show");
	}else{
		$(".modal-bodyTwo").text(data);
		$("#myModala").modal("show");
		setTimeout(function(){
			$("#myModala").modal("hide");
			location.reload();
		},time);
	}

};
//弹出层样式 && 弹出内容 返回刷新当前页
$(".refresh").live("click",function(){
	location.reload();
});