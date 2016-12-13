<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>账户设置</title>
<link href="/Public/<?php echo (C("projectName")); ?>/style/global2.0.css" media="screen" rel="stylesheet">
<link href="/Public/<?php echo (C("projectName")); ?>/style/profile1.6.6.css" media="screen" rel="stylesheet">
<link rel="shortcut icon" href="#/zhe800_favicon.ico">
</head>
<body>
<input type="hidden" id="important_alert" value="0">
<div id="toolbar">
  <div class="toolbar area">
    <div class="right flow"> <a href="#/help_center" class="contractKf" target="_blank">联系客服</a> | <a href="https://zhaoshang.zhe800.com/" target="_blank">卖家中心</a> </div>
    <div class="right" id="login" data-info="#"> <em id="tblogin"><span>您好，</span>
      <div class="dropdown myzhe"><span class="username"><a href="#/profile/my_rank" target="_blank">迷途~菠萝[QQ用户]</a><i class="icon-arrow arrow-down"></i><em></em></span><a class="icon-level level0" href="#/profile/my_rank" target="_blank"></a>&nbsp;
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
      |&nbsp;<a href="http://shop.zhe800.com/my/orders" id="mytrade" target="_blank">我的订单</a>|&nbsp;<a href="#" class="msg" target="_blank">我的消息<i class="msg-num">1</i></a>
      &nbsp;</em>
      <div class="hidden"></div>
    </div>
    <div class="right"> <a target="_blank" href="#/">团800旗下网站</a> |
      <div class="phone-qrcode-down"> <a target="_blank" href="#/app">手机版</a> |&nbsp;
        <div class="dropdown-menu">
          <p>扫一扫有惊喜</p>
          <a target="_blank" href="#/app"></a> </div>
      </div>
    </div>
  </div>
</div>
<header>
  <div class="area">
    <h1 class="l"> <a href="#/"></a> <br>
      折800，精选每日优质淘品 </h1>
    <div class="search">
      <form action="http://search.zhe800.com/search" target="_self">
        <input type="text" name="keyword" class="txt" title="巧克力">
        <input type="submit" class="smt" value="搜索">
      </form>
    </div>
    <div class="links"><a target="_blank" rel="nofollow" href="#/n/daiyanrenzhuanti"><img height="63" width="86" src="images/toolbar_links5_s.jpg"></a></div>
  </div>
</header>
<nav id="head_nav">
  <div class="head_nav area">
    <div class="l"> <a href="#/">首页<i></i></a> <a href="#/brand">品牌团<i></i></a> <a href="#/n/youpinhui">优品汇<i class="shop_hot"></i></a> <a href="#/ju_type/baoyou">8块8包邮<i></i></a> <a href="#/ju_type/fengding">20元封顶<i></i></a> <a href="http://shop.zhe800.com/">特卖商城<i></i></a> <a href="#/jifen">积分商城</a> <span class="n"></span> </div>
    <div class="r_con">
      <div class="yg_wrap"> <a href="#/jingxuanyugao" class="yg">精选预告 </a> </div>
    </div>
  </div>
</nav>

<!--商品详细S-->
<article id="container" class="area clear">
  <aside class="left">
    <dl class="sidePanel_user_rank">
      <dt>欢迎您，王儒标</dt>
      <dd><a class="my_rank" href="#" target="_blank">欢迎页</a></dd>
      <dd class="hr"></dd>
    </dl>
    <h3>账户设置</h3>
    <ul>
      <li class="setting cur"><a href="./user_files/user.html">基本资料</a></li>
      <li class="safe"><a href="#/account/safe">安全中心</a></li>
       <li class="safe"><a href="#/account/safe">资金管理</a></li>
    </ul>
    <h3>积分中心</h3>
    <ul>
      <li><a href="http://jifen.zhe800.com/profile/score_histories/all.html">我的积分</a></li>
      <li><a href="http://jifen.zhe800.com/profile/welfare.html">我的礼品</a></li>
    </ul>
    <h3>订单中心</h3>
    <ul>
      <li><a href="http://shop.zhe800.com/my/orders">我的订单</a></li>
      <li><a href="http://shop.zhe800.com/users/addresses">收货地址</a></li>
      <li><a href="http://shop.zhe800.com/my/comments">我的评价<em class="new"></em></a></li>
    </ul>
     <h3><a href="#">安全退出</a></h3>
  </aside>
  <section class="p_box">
    <div class="bindinghd">
      <h2>基本资料</h2>
    </div>
    <div class="navtag">
      <ul>
        <li class="cur"> <a href="#/account/setting/info/edit">个人信息</a> </li>
        <li> <a href="#/account/setting/avatar/edit">个人头像</a> </li>
        <li> <a href="#/account/setting/extend_info/show">扩展信息</a> </li>
      </ul>
    </div>
    <div class="profile_info clear" id="profile_form">
      <div class="l"> <img alt="头像" onerror="this.onerror=null;this.src=&#39;//passport.tuan800.com/img/user_default_logo_small.gif&#39;" src="images/user_default_logo_small.gif"> <span> <a href="#/account/setting/avatar/edit" class="">修改头像</a> </span> </div>
      <div class="description">为了让更多志同道合的网友认识您，请填写昵称，昵称将会显示在团800、折800、惠800等网站中，亲，一旦填写不能修改，填写后还能获得身份奖章和积分！ </div>
      <div class="set_box clear">
        <div class="item uname">
          <label>昵称：</label>
          <input type="text" class="itext1" id="uname">
          <span>(必填)</span> </div>
        <div class="item sex f14">
          <label>性别：</label>
          <p> <span>
            <input checked="checked" id="sex_1" name="sex" type="radio" value="1">
            男 </span> <span>
            <input id="sex_2" name="sex" type="radio" value="2">
            女 </span> </p>
        </div>
        <div class="item birthday f14" birthday-data="">
          <label>生日：</label>
		</div>
        <div class="item">
          <input type="submit" class="btn" id="reg_submit" value="保存">
        </div>
      </div>
    </div>
  </section>
</article>
<div class="about">
  <ul class="area">
    <li class="lw w1"> <span>关于我们</span> <a target="_blank" href="#/contact">关于我们</a> <a target="_blank" href="http://hr.tuan800.com/brand" rel="nofollow">诚聘英才</a> <a target="_blank" href="#/service_terms" rel="nofollow">服务条款</a> </li>
    <li class="lw"> <span>帮助中心</span> <a target="_blank" href="#/help_center/detail/234">联系我们</a> <a target="_blank" href="#/help_center/detail/82">服务协议</a> <a target="_blank" href="#/n/jubao"> 廉正举报</a> </li>
    <li class="lw"> <span>商务合作</span> <a target="_blank" href="https://zhaoshang.zhe800.com/">商家报名</a> <a target="_blank" href="#/friendly_links">友情链接</a> </li>
    <li class="lw w2"> <span>关注我们</span> <a target="_blank" href="http://e.weibo.com/tao800ju" rel="nofollow">新浪微博</a> <a target="_blank" title="下载桌面快捷方式" href="#/download_tao800?fn=%E6%8A%98800.url" rel="nofollow">下载桌面快捷方式</a> <a target="_blank" title="意见反馈" href="#/feedback" rel="nofollow">意见反馈</a> <a href="javascript:void(0)">在线客服</a></li>
    <li class="w3"> <span>下次怎么来?</span>
      <h3>记住域名： <a href="#/"> <em>zhe800.com</em> </a> </h3>
      <h4>百度搜索：
        <input type="text" class="bdtxt" onfocus="this.blur()" value="折800">
        <a class="smt" target="_blank" href="http://www.baidu.com/s?tn=baiduhome_pg&ie=utf-8&bs=%E6%8A%98800&f=8&rsv_bp=1&rsv_spt=1&wd=%E6%8A%98800&inputT=0" rel="nofollow"></a></h4>
      <h5>收藏本站：<a href="javascript:$.addfavorite()" id="clt"><u>加入收藏</u></a></h5>
      <h6>订阅本站： <br>
        <input type="text" id="subscribe_email" placeholder="输入您的邮件" class="txt">
        <input type="button" value="订阅" class="smt dysmt" onclick="$.tao_dingyue()">
      </h6>
    </li>
    <li class="w4"> <span>手机客户端</span> <a target="_blank" class="ios" href="#/app"></a> <a target="_blank" class="android" href="#/app"></a> <a target="_blank" class="wp" href="#/app"></a> <a target="_blank" class="wap" href="#/app"></a>
      <h4> <img width="72" height="73" alt="" src="images/wxcode_min.png">
        <p> 关注折800，秒杀早知道 <br>
          如何关注？ <br>
          1) 查找微信号“<em>zhe800-com</em>” <br>
          2) 用微信扫描左侧二维码 </p>
      </h4>
    </li>
  </ul>
</div>
<div class="friendly_links area" style=""> <span>友情链接：</span>
  <div class="links">
    <ul>
      <li><a href="http://www.yaolan.com/" target="_blank">摇篮网</a></li>
      <li><a href="http://www.cardbaobao.com/" target="_blank">卡宝宝信用卡</a></li>
      <li><a href="http://www.ef43.com.cn/" target="_blank">中国丽人网</a></li>
      <li><a href="http://www.chinairn.com/" target="_blank">研究报告</a></li>
      <li><a href="http://www.paixie.net/" target="_blank">拍鞋网</a></li>
      <li><a href="http://www.qqbaobao.com/" target="_blank">亲宝网</a></li>
      <li><a href="http://www.61baobao.com/" target="_blank">儿歌视频大全</a></li>
      <li><a href="http://www.uzai.com/" target="_blank">悠哉旅游网</a></li>
      <li><a href="http://www.114piaowu.com/" target="_blank">114票务网</a></li>
      <li><a href="http://www.mtv123.com/" target="_blank">叮当音乐</a></li>
    </ul>
  </div>
  <a href="#/friendly_links" target="_blank" class="more">更多&gt;&gt;</a> </div>
<footer> 
  <a target="_blank" href="http://www.miibeian.gov.cn/" rel="nofollow">京ICP证120075号</a>&nbsp;京ICP备10051110号-5 <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010502025623" target="_blank" rel="nofollow">京公网安备11010502025623</a> 食品流通许可证SP1101051510352397
  Copyright©2011-2016 版权所有 ZHE800.COM <br>
  <a href="http://www.itrust.org.cn/yz/pjwx.asp?wm=3571298269" target="_blank" rel="nofollow"> <img src="images/web_trust.png" width="70" height="26"></a> 
  <a id="___szfw_logo___" href="https://search.szfw.org/cert/l/CX20150121006886006587" target="_blank" rel="nofollow"><img src="images/cert.png" class="noborder"></a> <a rel="nofollow" target="_blank" href="https://ss.knet.cn/verifyseal.dll?sn=e150522110105588321uva000000&ct=df&a=1&pa=0.14795242729201963"><img width="76" height="28" class="noborder" style="border:0" src="images/credit.png"></a> 
</footer>
</body>
</html>