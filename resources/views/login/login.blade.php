<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>js带遮罩弹出层登录注册表单 - 站长素材</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="static/css/ui2.css?2013032917">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->  <!---->
</head>
<body class="land-bg">

 <a role="button" style="color:#fff; background:#000000; display:block; width:100px; margin:20px auto; font-size:16px; font-weight:bold; letter-spacing:3px; height:35px; line-height:35px; text-align:center;" data-category="UserAccount" data-action="login" data-toggle="modal" href="#login-modal">登录</a>

 <a role="button" style="color:#fff; background:#CC00FF; display:block; width:100px; margin:20px auto; font-size:16px; font-weight:bold; letter-spacing:3px; height:35px; line-height:35px; text-align:center;" data-category="UserAccount" data-action="login" data-toggle="modal" href="#signup-modal">注册</a>


  <a role="button" style="color:#fff; background:#66CC33; display:block; width:100px; margin:20px auto; font-size:16px; font-weight:bold; letter-spacing:3px; height:35px; line-height:35px; text-align:center;" data-category="UserAccount" data-action="login" data-toggle="modal" href="#forgetform">找回密码</a>
      <div class="modal in" id="login-modal" }> <a class="close" data-dismiss="modal">×</a>
        <h1>登录</h1>
        <ul class="login-bind-tp">
          <li class="qweibo"> <a href="http://sc.chinaz.com"><em>&nbsp;</em> QQ登录</a> </li>
          <li class="sina"> <a href="http://sc.chinaz.com"><em>&nbsp;</em> 微博登录</a> </li>
          <li class="douban"> <a href="http://sc.chinaz.com"><em>&nbsp;</em> 豆瓣登录</a> </li>
        </ul>
        <p>或者使用已有帐号登陆：</p>
        <form class="login-form clearfix" method="post" action="http://sc.chinaz.com">
          <div class="form-arrow"></div>
          <input name="email" type="text" placeholder="邮箱：">
          <input name="password" type="password" placeholder="密码：">
          <input type="submit" name="type" class="button-blue login" value="登录">
          <input type="hidden" name="return-url" value="">
          <div class="clearfix"></div>
          <label class="remember">
          <input name="remember" type="checkbox" checked/>
          下次自动登录 </label>
          <a class="forgot">忘记密码？</a>
          <ul class="third-parties">
            <li>
              <p data-url="">新浪微博帐号</p>
            </li>
            <li>
              <p data-url="">腾讯微博帐号</p>
            </li>
            <li>
              <p data-url="">豆瓣帐号</p>
            </li>
            <li>
              <p data-url=""></p>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal in" id="signup-modal" > <a class="close" data-dismiss="modal">×</a>
  <h1>注册</h1>
  <ul class="login-bind-tp">
    <li class="qweibo"> <a href="http://sc.chinaz.com"><em>&nbsp;</em> QQ登录</a> </li>
    <li class="sina"> <a href="http://sc.chinaz.com"><em>&nbsp;</em> 微博登录</a> </li>
    <li class="douban"> <a href="http://sc.chinaz.com"><em>&nbsp;</em> 豆瓣登录</a> </li>
  </ul>
  <p>或者使用邮箱注册：</p>
  <form class="signup-form clearfix" method="post" action="http://sc.chinaz.com">
    <p class="error"></p>
    <input name="email" type="text" placeholder="邮箱：">
    <input name="password" type="password" placeholder="密码：">
    <input name="password1" type="password" placeholder="确认密码：">
    <input name="username" type="text" placeholder="用户名：">
    <input type="hidden" name="title" value="">
    <input type="hidden" name="url" value="">
    <div class="clearfix"></div>
    <input type="button" name="type" class="button-blue reg" value="注册" data-category="UserAccount" data-action="regist">
    <ul class="third-parties">
      <li>
        <p data-url="">新浪微博帐号</p>
      </li>
      <li>
        <p data-url="">腾讯微博帐号</p>
      </li>
      <li>
        <p data-url="">豆瓣帐号</p>
      </li>
      <li>
        <p data-url=""></p>
      </li>
    </ul>
  </form>
</div>
<div class="modal in" id="forgetform"> <a class="close" data-dismiss="modal">×</a>
  <h1>忘记密码</h1>
  <form class="forgot-form" method="post" action="http://sc.chinaz.com">
    <input name="email" value="" placeholder="注册邮箱：">
    <div class="clearfix"></div>
    <input type="submit" name="type" class="forgot button-blue" value="发送重设密码邮件">
  </form>
</div>

<div class="modal in" id="activation-modal" style="display:none"}> <a class="close" data-dismiss="modal">×</a>
  <h1>设置用户信息</h1>
  <form class="signup-form clearfix" method="post" action="http://sc.chinaz.com">
    <input autocomplete=off name="username" value="" placeholder="用户名：">
    <input autocomplete=off name="password" type="password" placeholder="密码：">
    <input autocomplete=off name="password2" type="password" placeholder="确认密码：">
    <input type="submit" name="type" class="button-blue reg" value="确认并登录" data-category="UserAccount" data-action="regist">
    <div class="clearfix"></div>
  </form>
</div>
<div class="modal in" id="setpassword-modal" style="display:none"}> <a class="close" data-dismiss="modal">×</a>
  <h1>重置密码</h1>
  <form class="signup-form clearfix" method="post" action="http://sc.chinaz.com">
    <input name="email" value="">
    <input name="password" type="password" placeholder="密码：">
    <input name="password2" type="password" placeholder="确认密码：">
    <input name="token" type="hidden" value="">
    <input type="submit" name="type" class="button-blue reg" value="设置新密码并登录" data-category="UserAccount" data-action="reset">
    <div class="clearfix"></div>
  </form>
</div>

<script src="static/js/landing-min.js?2013032917"></script>
<div style="text-align:center;clear:both">
<p>适用浏览器：IE8、360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗.</p>
</div>
</body>
</html>
