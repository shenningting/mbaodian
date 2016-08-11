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
<meta name="keywords" content="面试宝典网，面试宝典官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
<meta name="description" content="慕课网（IMOOC）是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
<link rel="stylesheet" href="{{asset('css/base.css')}}" type="text/css" />
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
<link rel="stylesheet" href="{{asset('css/profile-less.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('css/user-common-less.css')}}" type="text/css" />
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
      <li class="active">
        <a href="/user/setprofile" class="onactive">个人资料</a>
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
      <li >
        <a no-pjajx href="/user/setbindsns">绑定帐号</a>
      </li>
    </ul>
  </div>
  <div class="setting-right">
    <div class="setting-right-wrap wrap-boxes settings" >
        

<div id="setting-profile" class="setting-wrap setting-profile">
    <form id="profile" >
    
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="nick" >昵称</label>
            <div class="rlf-group">
                <input type="text" name="nickname" id="nick"  autocomplete="off"  data-validate="nick"  class="input rlf-input rlf-input-nick" value="凤颖" placeholder="请输入昵称."/>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="job">职位</label>
            <div class="rlf-group">
                <select class="input rlf-select" name="job" hidefocus="true" id="job">
                    <option value="">请选择职位</option>
                                            <option value="1" >页面重构设计</option>
                                            <option value="6" >Web前端工程师</option>
                                            <option value="5" >JS工程师</option>
                                            <option value="8" >PHP开发工程师</option>
                                            <option value="11" >JAVA开发工程师</option>
                                            <option value="7" >移动开发工程师</option>
                                            <option value="9" >软件测试工程师</option>
                                            <option value="10" >Linux系统工程师</option>
                                            <option value="2" >交互设计师</option>
                                            <option value="3" >产品经理</option>
                                            <option value="4" >UI设计师</option>
                                            <option value="13" >学生</option>
                                    </select>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="province-select">城市</label>
            <div class="rlf-group profile-address">
                <select id="province-select" class='input' hidefocus="true">
                    <option value="0">选择省份</option>
                                            <option value="1">北京</option>
                                            <option value="2">天津</option>
                                            <option value="3">河北</option>
                                            <option value="4">山西</option>
                                            <option value="5">内蒙古</option>
                                            <option value="6">辽宁</option>
                                            <option value="7">吉林</option>
                                            <option value="8">黑龙江</option>
                                            <option value="9">上海</option>
                                            <option value="10">江苏</option>
                                            <option value="11">浙江</option>
                                            <option value="12">安徽</option>
                                            <option value="13">福建</option>
                                            <option value="14">江西</option>
                                            <option value="15">山东</option>
                                            <option value="16">河南</option>
                                            <option value="17">湖北</option>
                                            <option value="18">湖南</option>
                                            <option value="19">广东</option>
                                            <option value="20">海南</option>
                                            <option value="21">广西</option>
                                            <option value="22">甘肃</option>
                                            <option value="23">陕西</option>
                                            <option value="24">新疆</option>
                                            <option value="25">青海</option>
                                            <option value="26">宁夏</option>
                                            <option value="27">重庆</option>
                                            <option value="28">四川</option>
                                            <option value="29">贵州</option>
                                            <option value="30">云南</option>
                                            <option value="31">西藏</option>
                                            <option value="32">台湾</option>
                                            <option value="33">澳门</option>
                                            <option value="34">香港</option>
                                            <option value="100">其他</option>
                                    </select>
                <select class='input' id="city-select" hidefocus="true">
                    <option value="0">选择城市</option>
                                    </select>
                <select class='input mr0' id="area-select" hidefocus="true">
                    <option value="0">选择区县</option>
                                    </select>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" >性别</label>
            <div class="rlf-group rlf-radio-group">
                <label ><input type="radio" hidefocus="true" value="0" checked="checked"  name="sex">保密</label>
                <label ><input type="radio" hidefocus="true" value="1"  name="sex">男</label>
                <label ><input type="radio" hidefocus="true" value="2"  name="sex">女</label>
            </div>
            <p class="rlf-tip-wrap"></p>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="aboutme">个性签名</label>
            <div class="rlf-group">
                <textarea name="aboutme" id="aboutme" cols="30" rows="5" class="textarea"></textarea>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for=""></label>
            <div class="rlf-group">
                <span id="profile-submit"  hidefocus="true"  aria-role="button" class="rlf-btn-green btn-block profile-btn">保存</span>
            </div>
        </div>
    </form>
    
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
