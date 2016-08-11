<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>面试宝典</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="keywords" content="慕课网，慕课官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
<meta name="description" content="慕课网（IMOOC）是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
<link rel="stylesheet" href="/{{asset('css/base.css')}}" type="text/css" />
<script type="text/javascript">

      var OP_CONFIG={"module":"user","page":"setprofile","userInfo":{"uid":3071208,"nickname":"\u51e4\u9896","head":"http:\/\/img.mukewang.com\/images\/unknow-80.png","usertype":"1","roleid":0}};
  var isLogin = 1;
var is_choice = "";
  var seajsTimestamp="v=201604211612";
  </script>
 
<!--
<link rel="stylesheet" href="/static/component/logic/login/login-regist.css" type="text/css" />
<link rel="stylesheet" href="/static/css/settings.css" type="text/css" />
-->
<link rel="stylesheet" href="{{asset('css/common-less.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('css/login-regist.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('css/settings.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('css/user-common-less.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('css/avtou-less.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('css/layer.css')}}" type="text/css" />
</head>
<body >
@extends('layouts.master')
@section('sidebar')
@parent
<div id="main">

<div class="settings-cont clearfix">

  <div class="setting-left l">
    <ul class="wrap-boxes">
      <li>
        <a href="/user/setprofile">个人资料</a>
      </li>
      <li >
         <a href="/user/setavator">头像设置</a>
       </li>
       
      <li >
        <a href="/user/setphone">手机设置</a>
                    <span class='unbound'>未绑定</span>
              </li>
      
      <li >
        <a href="/user/setverifyemail">邮箱验证</a>
                    <span class='unbound'>未绑定</span>
              </li>
      <li >
        <a href="/user/setresetpwd">修改密码</a>
      </li>
      <li  class="active">
        <a no-pjajx href="/user/setbindsns"  class="onactive">绑定帐号</a>
      </li>
    </ul>
  </div>
  <div class="setting-right">
    <div class="setting-right-wrap wrap-boxes settings" >
        
<div class="setting-bindsns">
<p>绑定第三方帐号，可以直接登录，还可以将内容同步到以下平台，与更多好友分享。</p>
<div class="setting-bindsns-inner clearfix">
		<div class="setting-bindsns-weixin l">
		<i class="icon-weixin"></i>
		<p>未绑定帐号</p>
		<a class="rlf-btn-green sbtn-green js-bind " hidefocus="true" aria-role="button" href="/passport/user/tplogin?tp=weixin&amp;bind=1">立即绑定</a>
	</div>
			<div class="setting-bindsns-weibo l">
		<i class="icon-weibo"></i>
		<p>未绑定帐号</p>
		<a class="rlf-btn-green sbtn-green js-bind " hidefocus="true" aria-role="button" href="/passport/user/tplogin?tp=weibo&amp;bind=1">立即绑定</a>
	</div>
	
		<div class="setting-bindsns-qq binded-qq l">
		<i class="icon-qq"></i>
		<p>已绑定QQ帐号</p>
		<a href="javascript:void(0)" class="sbtn-gy" data-unbind="qq">解除绑定</a>
	</div>
	</div>
</div>


    </div>
  </div>
  
</div>

</div>
@endsection
<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="/user/feedback" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="http://www.imooc.com/mobile/app" >
        <div class="elevator-app-box">
        </div>
    </a>
    <a class="elevator-top" href="javascript:;" style="display:none" id="backTop"></a>
</div>



<!--script-->
<script src="{{asset('js/ssologin.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sea.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sea_config.js')}}?v=201604211612"></script>
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>

 


<div style="display: none">
</div>
</body>
</html>
