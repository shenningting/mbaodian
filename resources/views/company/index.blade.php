<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        公司试题------面试宝典
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375" />
    <meta property="wb:webmaster" content="c4f857219bfae3cb" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="Cache-Control" content="no-transform " />

    <meta name="Keywords" content="" />

    <link rel="stylesheet" href="{{asset('css/d79d81e9ab144c28aae8b073106e6881.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/nowcoder-ui.css')}}">
</head>
<style>
	.xxx{
		padding-left:10px;
	}
	.zzz{
		padding-left:10px;
	}

</style>
@extends('layouts.master')
@section('sidebar')
    @parent

<body style="background:#fff;">
<input type="hidden"  id="college">
<div class="nk-main test-center-page clearfix" style=" margin-top:50px;">
<div class="test-center-bar">
<ul class="test-center-menu">
<li>
<div class="tcm-mod">
<div class="tcm-arrow"></div>
<h4 class="tcm-hd">职业方向</h4>
<div class="tcm-bd">
<a class="zzz" data-id="互联网工程" href="#">互联网工程</a>
<a class="zzz" data-id="web前端" href="#">web前端</a>
</div>
</div>
<div class="mod-sub-wrap">
<div class="tcm-sub-mod">
<h4 class="tcm-hd">职业方向</h4>
<div class="tcm-bd">
@foreach($re as $key=>$value)
<a class="zzz" data-id="{{$value['d_name']}}" href="#">{{$value['d_name']}}</a>
@endforeach
</div>
</div>
</div>
</li>
<li>
<div class="tcm-mod">
<div class="tcm-arrow"></div>
<h4 class="tcm-hd">公司</h4>
<div class="tcm-bd">
<a href="#" class="xxx"
data-id="134">阿里巴巴</a>
<a href="#" class="xxx" data-id="腾讯">腾讯</a>
<a href="#" class="xxx" data-id="百度">百度</a>
</div>
</div>
<div class="mod-sub-wrap">
<div class="tcm-sub-mod">
<h4 class="tcm-hd">公司</h4>
<div class="tcm-bd">
@foreach($arr as $key=>$value)
<a class="xxx" data-id="{{$value['company_name']}}" href="#">{{$value['company_name']}}</a>

@endforeach
</div>
</div>
</div>
</li>
</ul>
<div class="module-box">
<a href="#" class="btn btn-primary btn-block">2016春招备考计划</a>
</div>
</div>
<div class="nk-content">


<div class="module-box">
<div class="menu-box">
<ul class="menu clearfix">
<li class="selected"><a href="javascript:void(0);">最新</a></li>
</ul>
</div>
<div class="module-body" id="exam">
<ul class="content-item-box clearfix">
@foreach($exam as $key=>$value)
<li>
<a href="college_exam?id={{$value['s_id']}}">
<div class="content-item-brief">
<h1>{{$value['s_logo']}}</h1>
<div class="web-logoimg">
<img src="http://123.56.249.121/android/web/{{$value['s_img']}}" style="width:50px; height:50px;" />
</div>
<div class="exam-foot">已有{{$value['click']}}人参加</div>
<dl class="exam-info">
<dd><span class="link-green"></span></dd>
<dd class="exam-btn"><span class="btn  btn-block btn-primary" >查看详情</span></dd>
</dl>
</div>                                               
</a> 
</li>
@endforeach
</ul>
</div>
<div class="pagination">
     <style>
                        .pager li{
                            float:left;
                            margin-left:200px;
                        }
                    </style>
<?php echo $exam->render(); ?>
</div>
</div>
</div>
</div>

<div class="fixed-foot clearfix js-fixed-foot" style="display:none;">
<div class="fixed-foot-main">
<div class="fixed-foot-tip">刷真题、补算法、看面经、得内推</div>
<div class="fixed-foot-login">
<span>使用第三方账号直接登录使用吧：</span>
<a href="javascript:void(0);" data-href="https://api.weibo.com/oauth2/authorize?client_id=3023520088&redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Fsinaconfig&response_type=code&state=web&scope=follow_app_official_microblog" class="ft-login-item ft-login-wb nc-js-action-oauth" title="登录微博"></a>
<a href="javascript:void(0);" data-href="https://graph.qq.com/oauth2.0/authorize?client_id=101003590&redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Fqqconfig&response_type=code&state=web" class="ft-login-item ft-login-qz nc-js-action-oauth" title="登录Qzone"></a>
<a href="javascript:void(0);" data-href="https://open.weixin.qq.com/connect/qrconnect?appid=wxfee0340998de6ab1&redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Flogin%2Fweixin&response_type=code&scope=snsapi_login&state=11" class="ft-login-item ft-login-wx nc-js-action-oauth" title="登录微信"></a>
<a href="javascript:void(0);" data-href="https://github.com/login/oauth/authorize?client_id=1c539827b9400016d0c9&scope=user:email&redirect_uri=http%3A%2F%2Fwww.nowcoder.com%2Foauth2%2Fgitconfig&response_type=code&state=web" class="ft-login-item ft-login-git nc-js-action-oauth" title="登录git"></a>
<a href="javascript:void(0);" class="more-login nc-req-auth">更多</a>
</div>
</div>
</div>
<div class="ad-window-sm js-global-tips" style="display:none;">
<a href="javascript:void(0);" class="ad-close">X</a>
<div class="ad-live-active"></div>
<a class="link-green js-global-tips-href" target="_blank" href="">点击查看>></a>
</div>

</div>
<script src="{{asset('js/sea_1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/base.js')}}"></script>
<script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>

<script>
		$(document).on("click",".zzz",function(){
			var name = $(this).attr("data-id");
			$("#college").attr('value',name);
			$.get("college",{name:name},function(data){
				$("#exam").html(data);
			})
		})
		$(document).on("click",".xxx",function(){
			var name_z = $("#college").val();
			var name_x = $(this).attr("data-id");
			$.get("college_x",{name_z:name_z,name_x:name_x},function(data){
				$("#exam").html(data);
			})
		})

</script>






<script type="text/javascript">
seajs.use('nowcoder/1.2.456/javascripts/site/common/index');
seajs.use('nowcoder/1.2.456/javascripts/site/common/nav');
</script>
<span id='cnzz_stat_icon_1253353781' style="display:none;"></span>
<script type="text/javascript">
window.parameter = {
mutiTagIds: ''
};
seajs.use('nowcoder/1.2.456/javascripts/site/contest/paperList');
</script>
</body>
@endsection
</html>
