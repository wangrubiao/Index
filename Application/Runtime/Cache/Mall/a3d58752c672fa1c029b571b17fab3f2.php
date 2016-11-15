<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>我的购物车 - 折800特卖商城</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="/Public/<?php echo (C("projectName")); ?>/style/cart.css">
</head>
<body>
<div id="toolbar">
  <div class="toolbar area">
    <div class="right flow"><a href="#" class="contractKf" target="_blank">联系客服</a></div>
    <div class="right" id="login" data-rendered="yes"><em id="tblogin"><span>您好，</span>
      <div class="dropdown myzhe"><span class="username"><a href="#" target="_blank">迷途~菠萝[QQ用户]</a><i class="icon-arrow arrow-down"></i><em></em></span><a class="icon-level level0" href="#" target="_blank"></a>
        <ul class="dropdown-menu">
          <li><a href="#" target="_blank">我的收藏</a></li>
          <li><a href="#" target="_blank">账号信息</a></li>
          <li><a href="#" target="_blank">我的订单</a></li>
          <li><a href="#" target="_blank">消费保障</a></li>
          <li><a href="#" target="_blank">我的积分</a></li>
          <li><a href="#" target="_blank">优惠券</a></li>
          <li><a href="#" target="_blank">我的等级</a></li>
          <li><a class="exit" href="#">退出</a></li>
          <li><a href="#" target="_blank">我的抽奖</a></li>
        </ul>
      </div>
      |&nbsp;<a href="#" id="mytrade" target="_blank">我的订单&nbsp;</a>|&nbsp;<a href="#" class="msg" target="_blank">我的消息<i class="msg-num">3</i></a>
      <div class="msg-tips" style="display: none;"><span>2016年4月6日起，折800会员积分体系即将全面升级，敬请期待，<a target="_blank" href="#">查看详</a>...</span><i class="up-arr"></i><i class="close-tips"></i></div>
      </em>
      <div class="hidden"></div>
      |&nbsp;
      <div data-behavior="minicart" class="dropdown minicart"><span class="cart"><a target="_blank" href="#"><i></i>购物车<b data-cart-count-number="cart" class="count">9</b></a></span>
        <div class="dropdown-menu"></div>
      </div>
      &nbsp;|</div>
    <div class="right"><a target="_blank" href="#">团800旗下网站</a>&nbsp;|&nbsp;</div>
  </div>
</div>
<header>
  <div class="area">
    <div class="l"> <a href="#/"> <img src="/Public/<?php echo (C("projectName")); ?>/images/logo2015cart.png"></a> <br>
      折800，精选每日优质淘品</div>
    <div class="order_r"></div>
  </div>
</header>
<article class="area" id="cart">
  <div id="cart_panel_wrapper">
    <div class="title clear">
      <div class="righti"><span></span></div>
      <p class="l">购物车<b class="count"><i data-recount="items-count"><?php echo (count($list)); ?></i></b></p>
    </div>
    <section id="cart_items_panel" class="itemlist clear">
      <form>
        <div class="head clear">
          <p class="all">
            <input type="checkbox" checked="checked">
           <span><a href="http://cart.zhe800.com/cart#" data-toggle="cart-select-all">全选</a></span></p>
          <p class="products">商品</p>
          <p class="price">单价（元）</p>
          <p class="number">数量</p>
          <p class="money">金额（元）</p>
          <p class="operation">操作</p>
        </div>
        <div class="item" data-type="cart-item" data-seller-id="1191932" data-fresh="on"> 
          <!-- 全部操作 -->
          <div class="hd">
            <div class="r" data-discount-desc="status"><span class="co1">已享受满200元减10元优惠</span><a class="js_dsc" href="#" target="_blank">更多商品&gt;&gt;</a></div>
            <div class="discount-rule r" data-discount-desc="rule">
              <p class="type"><i>满减</i>满200元减10元</p>
            </div>
            <div class="l"> <a target="_blank" class="js_utm_params" href="#"><i></i><span class="name">左珞斯品牌服饰</span></a> <span class="im_icon">
              <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2278906920&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:2278906920:51" alt="QQ咨询" title="QQ咨询"></a>
              </span> </div>
          </div>
          <!-- 全部操作 end-->
          <table>
            <tbody>

              <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr data-behavior="show-stat" data-stat-dealid="3561149" data-sku-id="<?php echo ($vo["id"]); ?>" data-stat-sourcetype="zhe" data-stat-pos-type="cart" data-stat-pos-value="valid" class="item-selected" data-product-id="ze151020141220000658" data-stat-x="4" data-stat-y="1" data-stat-n="4" data-ssid="SS14589704236868259">
                <td class="cb">
                    <input type="checkbox" name="cart_key" value="ze151020141220000658|1-1001:2-1108" data-is-yph="1" checked="checked">
                </td>

                <td><div class="products">
                    <figure><a class="abc" href="#" target="_blank"><img src="<?php echo ($vo["img_url"]); ?>" data-origin="http://z3.tuanimg.com/imagev2/trade/800x800.ef97f14b841b8b2a5315967e00bce4a3.100x100.jpg" data-stat-dealid="3561149"></a></figure>
                    <h3> <a href="http://out.zhe800.com/jump?deal_id=3561149&url=http%3A%2F%2Fshop.zhe800.com%2Fproducts%2Fze151020141220000658&jump_source=1&qd_key=qyOwt6Jn" target="_blank">嬉皮少女2015秋冬新款修身显瘦百搭牛仔裤小脚女裤铅笔裤女长裤潮</a> <em class="pro_ppt" title="品牌团"></em><em class="return" title="本商品支持8天无理由退货"></em><em class="audit0" title="本商品由折800买手砍价"></em> </h3>
                    <div class="type">
                      <div class="icon-wrapper"><span class="icon-sku-edit" data-behavior="cart-item-modify">修改</span></div>
                      <input type="hidden" name="cart_price" value="69">
                      <input type="hidden" name="sku_num" value="1-1001:2-1108">
                      <input type="hidden" name="sku_num_new" value="1-1001:2-1108">
                      <div data-prop="sku-desc">颜色:<?php echo ($vo["spec_name"]); ?></div>
                      <div data-prop="sku-desc">尺码:<?php echo ($vo["focus_name"]); ?></div>
                      <div class="nubA item-modify-wrapper"></div>
                    </div>
                  </div></td>

                <td><div class="price">
                    <p><del data-price="original">182.00</del></p>
                    <p><b data-price="unit"><?php echo ($vo["spec_mey"]); ?></b></p>
                    <div class="time_z tz1">限时<span class="discount">3.8</span>折
                      <time data-start-time="1458781200000" data-end-time="1459612740000" data-now-time="1458970849755">7天10小时18分11秒</time>
                    </div>
                  </div></td>

                <td>
                  <div class="number">
                    <p data-total-count="<?php echo ($vo["spec_stock"]); ?>" data-lock-count="0" data-sku-count="20">
                      <i class="decrease" data-sku="id_<?php echo ($vo["id"]); ?>">-</i>
                      <input type="text" data-behavior="cart-count-input" name="count" value="<?php echo ($vo["num"]); ?>" data-value="<?php echo ($vo["num"]); ?>" class="id_<?php echo ($vo["id"]); ?>" disabled>
                      <i class="increase" data-sku="id_<?php echo ($vo["id"]); ?>">+</i>
                    </p>
                    <var class="err" style=""></var>
                  </div>
                </td>

                <td><div class="money" data-unit-original-price="546.00" data-recount="item-price"><?php echo ($vo["count"]); ?>.00</div></td>
                <td><div class="operation"><a href="#" data-behavior="cart-item-delete" data-sku-id="<?php echo ($vo["id"]); ?>">删除</a></div></td>
              </tr><?php endforeach; endif; ?>

            </tbody>
          </table>
        </div>
      </form>
    </section>
    <section id="cart_no_items_panel" class="cart_undefined clear" style="display: none;">
      <div class="dlncyl"> <i class="un_cart_i"></i>
        <div class="txt">好遗憾呐~您添加的商品已失效<br>
          更多宝贝在呼唤您</div>
        <a href="http://shop.zhe800.com/">去逛逛</a> </div>
    </section>
    <section id="no_items_panel" class="cart_undefined clear" style="display: none;">
      <div class="dlncnl"> <i class="un_cart_i"></i>
        <div class="txt">您的购物车还空着呢~<br>
          宝贝这么多~</div>
        <a href="http://shop.zhe800.com/">去逛逛</a> </div>
    </section>
    <section id="cart_recount" class="area submitbox">
      <div class="fixedbox fixed">
        <p class="all"><i class="checkbox on" data-behavior="checkbox" data-toggle="cart-select-all" data-checked="on">
          <label for=""></label>
          <input type="checkbox" checked="checked">
          </i><span><a href="http://cart.zhe800.com/cart#" data-toggle="cart-select-all">全选</a><a href="http://cart.zhe800.com/cart#" class="del" data-behavior="cart-items-delete">批量删除</a></span></p>
        <div class="r"> <span class="amount">共<b data-recount="items-amount">19</b>件</span><span>总计（不含运费）：<strong>￥<i data-recount="amount-price">1751.00</i></strong></span> <a href="http://cart.zhe800.com/cart#" class="accounts" data-behavior="cart-clearing">结算</a> </div>
      </div>
    </section>
  </div>
  <section class="recommend area" data-dealids="3561149.3561149.3561149.3561149.3561149.3325263.3325263.3325263.3325263">
    <div class="hd"><span>您可能还需要</span></div>
    <ul>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze160302193811205644" data-stat-dealid="3492279" data-stat-sourcetype="zhe" data-stat-x="1" data-stat-y="1" data-stat-n="1" data-ssid="SS14589704280873702"><a target="_blank" href="http://out.zhe800.com/ju/deal/2016kuan_3492279?utm_content=cart"><img src="./cart_files/700x700.de685c6c6cf138e652ffab6bb1f45ada.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/2016kuan_3492279?utm_content=cart">棉质翻领加大版胖子男夹克</a></h3>
        <p><b>￥138</b>新品上架</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze160302194219205669" data-stat-dealid="3385459" data-stat-sourcetype="zhe" data-stat-x="1" data-stat-y="2" data-stat-n="2" data-ssid="SS14589704281006010"><a target="_blank" href="http://out.zhe800.com/ju/deal/chunqiuzhu_3385459?utm_content=cart"><img src="./cart_files/700x700.9b66fc02b599c13f0bd01f1eaa64895b.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/chunqiuzhu_3385459?utm_content=cart">春秋装中年夹克男外套大码</a></h3>
        <p><b>￥79</b>新品上架</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze160308220331243409" data-stat-dealid="3407957" data-stat-sourcetype="zhe" data-stat-x="1" data-stat-y="3" data-stat-n="3" data-ssid="SS14589704281003695"><a target="_blank" href="http://out.zhe800.com/ju/deal/2016nan_3407957?utm_content=cart"><img src="./cart_files/700x700.9d6349030cafa4a5cca9ddb2a1437f9b.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/2016nan_3407957?utm_content=cart">2016男士春季夹克外套休闲薄款立领中年男士夹克衫修身时尚爸爸装</a></h3>
        <p><b>￥138</b>新品上架</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze160302172756204879" data-stat-dealid="3381643" data-stat-sourcetype="zhe" data-stat-x="1" data-stat-y="4" data-stat-n="4" data-ssid="SS14589704281019238"><a target="_blank" href="http://out.zhe800.com/ju/deal/chunqiujiz_3381643?utm_content=cart"><img src="./cart_files/700x700.3db892ef3225a9a2f6254f1a800c7be2.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/chunqiujiz_3381643?utm_content=cart">春秋季中年男士立领夹克衫</a></h3>
        <p><b>￥59</b>已售53个</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze160227190559183901" data-stat-dealid="3407571" data-stat-sourcetype="zhe" data-stat-x="1" data-stat-y="5" data-stat-n="5" data-ssid="SS14589704281027227"><a target="_blank" href="http://out.zhe800.com/ju/deal/zhongniann_3407571?utm_content=cart"><img src="./cart_files/700x700.f584212a5e8dc5b76d729eae19f9722d.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/zhongniann_3407571?utm_content=cart">中年男士夹克外套2016春款男装薄款休闲修身夹克衫西装领外套男</a></h3>
        <p><b>￥88</b>新品上架</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze151217155029000051" data-stat-dealid="3434511" data-stat-sourcetype="zhe" data-stat-x="2" data-stat-y="1" data-stat-n="6" data-ssid="SS14589704281023970"><a target="_blank" href="http://out.zhe800.com/ju/deal/chunjinans_3434511?utm_content=cart"><img src="./cart_files/700x700.17c15680e1db222ab0f5aa4c860ecc11.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/chunjinans_3434511?utm_content=cart">男士商务休闲夹克外套</a></h3>
        <p><b>￥108</b>新品上架</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze160302191938205577" data-stat-dealid="3385483" data-stat-sourcetype="zhe" data-stat-x="2" data-stat-y="2" data-stat-n="7" data-ssid="SS14589704281037163"><a target="_blank" href="http://out.zhe800.com/ju/deal/chunjixink_3385483?utm_content=cart"><img src="./cart_files/700x700.774c509fef2e54003f52346246d2b94d.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/chunjixink_3385483?utm_content=cart">春季新款休闲大码男士夹克衫</a></h3>
        <p><b>￥79</b>新品上架</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze151202151645000854" data-stat-dealid="3462831" data-stat-sourcetype="zhe" data-stat-x="2" data-stat-y="3" data-stat-n="8" data-ssid="SS14589704281038780"><a target="_blank" href="http://out.zhe800.com/ju/deal/zhonglaoni_3462831?utm_content=cart"><img src="./cart_files/700x700.a48e1449a4a0915a21c41704c587d0d7.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/zhonglaoni_3462831?utm_content=cart">中老年休闲修身夹克外套</a></h3>
        <p><b>￥49</b>已售229个</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze151031230316000735" data-stat-dealid="3539101" data-stat-sourcetype="zhe" data-stat-x="2" data-stat-y="4" data-stat-n="9" data-ssid="SS14589704281054702"><a target="_blank" href="http://out.zhe800.com/ju/deal/zhongniann_3539101?utm_content=cart"><img src="./cart_files/700x700.534bd5ab74d23eede10fd1a83fb195f4.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/zhongniann_3539101?utm_content=cart">中年男士夹克外套2015秋冬新款男装立领夹克男商务休闲茄克爸爸装</a></h3>
        <p><b>￥79</b>已售153个</p>
      </li>
      <li data-behavior="show-stat" data-stat-pos-type="recom" data-stat-pos-value="cart_bottom" data-zid="ze151215145819001453" data-stat-dealid="3429143" data-stat-sourcetype="zhe" data-stat-x="2" data-stat-y="5" data-stat-n="10" data-ssid="SS14589704281067654"><a target="_blank" href="http://out.zhe800.com/ju/deal/hebianluzh_3429143?utm_content=cart"><img src="./cart_files/700x700.2808cf14b34a44a4438dc407447374fa.180x180.jpg.webp"></a>
        <h3><a target="_blank" href="http://out.zhe800.com/ju/deal/hebianluzh_3429143?utm_content=cart">河边鹿中老年男棉衣外套</a></h3>
        <p><b>￥79.9</b>新品上架</p>
      </li>
    </ul>
  </section>
</article>
<div style="display:none;"> <a href="#" id="right_faq"></a> </div>
<footer>
  <p> <a target="_blank" href="#/contact">关于我们</a> | <a target="_blank" href="http://hr.tuan800.com/brand">诚聘英才</a> | <a target="_blank" href="#/service_terms">服务条款</a> | <a target="_blank" href="#/n/jubao">廉正举报</a> | <a target="_blank" href="#/help/cs_support">消费者保障</a> | <a target="_blank" href="#/friendly_links">友情链接</a> | <a href="javascript:void()" class="feedback_popup_handler">意见反馈</a> | <a href="javascript:void(0)">在线客服</a></p>
  <a href="http://www.miibeian.gov.cn/" target="_blank" style="color:#999" rel="nofollow">京ICP证120075号</a> 京ICP备10051110号-5 <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010502025623" target="_blank" rel="nofollow">京公网安备11010502025623</a> 食品流通许可证SP1101051510352397 Copyright©2011-2015 版权所有 ZHE800.COM <br>
  <a href="http://www.itrust.org.cn/yz/pjwx.asp?wm=3571298269" target="_blank" rel="nofollow"><img width="70" height="26" src="./cart_files/web_trust.png"></a> <a id="___szfw_logo___" href="https://search.szfw.org/cert/l/CX20150121006886006587" target="_blank" rel="nofollow"><img src="./cart_files/cert.jpg" width="70" height="26" style="border:0"></a> <a rel="nofollow" target="_blank" href="https://ss.knet.cn/verifyseal.dll?sn=e150522110105588321uva000000&ct=df&a=1&pa=0.14795242729201963"><img width="76" height="28" style="border:0" src="./cart_files/credit.png"></a> 
  <script type="text/javascript">(function(){document.getElementById('___szfw_logo___').oncontextmenu = function(){return false;}})();</script> 
</footer>
    <aside class="sidepanel">
  <ul class="list">
        <li class="i1" style="display:block;"><a class="js_questionspub" href="#" target="_blank">常见问题</a></li>
        <li class="i2"><a class="feedback_popup_handler" href="javascript:">用户反馈</a></li>
        <li class="i3"><a href="javascript:void(0)">在线客服</a></li>
        <li class="i4  hidden"><a class="js_gotoppub" href="#">返回顶部</a></li>
      </ul>
</aside>
</body>
</html>
<script src="/Public/Library/jquery-1.9.1/jquery.min.js"></script>
<script src="/Public/Library/layer-v2.2/layer.js"></script>
<script type="text/javascript">
$(document).ready(function(){
        /*****
         *增减数量
         ****/
        $("tbody tr").mouseover(function(){
           var count = $(".number p",this).data("total-count");
           var sku_value = $(".number p input",this);
           var decrease = $(".decrease",this).unbind();
           var increase = $(".increase",this).unbind();
           var err = $(".err",this);
           var price = $(".price b",this).text(); //产品单价
           var money = $(".money",this);  //产品总价
           var sku_id = $(this).data("sku-id");
           var checkdel = $(".operation a",this);
          //减去数量
          $(sku_value).keyup(function(){
            if(sku_value.val()=="" || sku_value.val()==0 ){
              sku_value.val(1);
            }
            var num = parseFloat($(this).val())*price;
            $(money).text(num.toFixed(2));
          });
          $(decrease).click(function(){
              if(sku_value.val() <= 1){
                 $(decrease).addClass("no-drop");
                $(increase).removeClass("no-drop")
              }else{
                $(sku_value).val(parseFloat($(sku_value).val())-1);
                $(increase).removeClass("no-drop");
                //更改购物车最新状态
                var url  = "<?php echo U('Cart/less');?>";
                $.post(url,{sku_id:sku_id},function(data){
                    if(data['status']){
                      var num = parseFloat($(sku_value).val())*price;
                      $(money).text(num.toFixed(2));
                      if(count >= sku_value.val()){
                        $(err).text("");
                      }
                    }
                });
              }
          });
          //增加数量
          $(increase).click(function(){
            if(sku_value.val() >= count){
              $(decrease).removeClass("no-drop");
              $(increase).addClass("no-drop");
              $(err).text("很抱歉,库存仅剩下"+count+"件");
              
            }else{
              $(decrease).removeClass("no-drop");
              $(sku_value).val(parseFloat($(sku_value).val())+1);
              $(sku_value).data("value",(parseFloat($(sku_value).val())+1))
              //更改购物车最新状态
                var url  = "<?php echo U('Cart/add');?>";
                $.post(url,{sku_id:sku_id},function(data){
                    if(data['status']){
                      var num = parseFloat($(sku_value).val())*price;
                      $(money).text(num.toFixed(2));
                    }
                });
            }
          });
          return false;
        });
      /*****
       *删除商品
      ****/
      $(".operation a").on("click",function(){
          var sku_id = $(this).data("sku-id");
          var url  = "<?php echo U('Cart/del');?>";
          layer.confirm('是否删除该商品?', {
            title: "温馨提示",
            btn: ['确定','取消'] //按钮
          }, function(){
              $.post(url,{sku_id:sku_id},function(data){
                if(data['status']){
                  $("tr[data-sku-id="+sku_id+"]").hide(1000,function(){
                      layer.msg('删除成功', {icon: 1});
                      $(".count i").text(data['content']);
                  });
                  
                }
             });
          }, function(){
            //取消
          });
      });
});
</script>