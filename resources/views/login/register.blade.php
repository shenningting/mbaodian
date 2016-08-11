<!DOCTYPE html>
<!-- saved from url=(0045)http://www.imooc.com/user/newsignup/from_url/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>慕课网-注册</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375">
    <meta property="wb:webmaster" content="c4f857219bfae3cb">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta http-equiv="Cache-Control" content="no-transform ">
    <meta name="keywords" content="慕课网，慕课官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程">
    <meta name="description" content="慕课网（IMOOC）是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。">

    <link rel="stylesheet" href="{{asset('css/base.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/common-less.css')}}" type="text/css">
    <script src="{{asset('js/push.js')}}"></script><script type="text/javascript" async="" src="{{asset('js/rt.js')}}"></script><script type="text/javascript">

        var OP_CONFIG={"module":"user","page":"newsignup"};
        var isLogin = 0;
        var is_choice = "";
        var seajsTimestamp="v=201603251711";
        var ownName="2629864782@qq.com"

    </script>

    <link rel="stylesheet" href="http://www.imooc.com/static/css/user/loginsign-less.css">
    <script>
        var fromURL='';
    </script>


<body>

<div id="head" class="sig-head">
    <a href="index" target="_self" class="sig-img">慕课网</a>
</div>


<div id="main">

    <div class="container">
        <div class="wrap clearfix">
            <div class="wrap-left">
                <div class="login-wrap">
                    <div class="wel-hd">
                        <h1 class="form-h1 l">欢迎注册</h1>
                        <a href="login" class="on-register r">直接登录</a>
                        <span class="no-account r">已有帐号</span>
                    </div>
                    <div class="form-controls">
                        <form class="valid-form" id="js-signup-form" autocomplete="off" action='reg' method='post' onsubmit="return sub()">
                            <script>
                                function sub(){
                                   // alert(checkname());
                                    if(flag&&emailflag&&phoneflag){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
                            </script>
                            <div class="form-control">
                                <p id="js-g-signup-error" class="tips login-g-error"></p>
                            </div>
                            <div class="form-control proclaim-loc">
                                <input type="text" name="username" id="username" data-validate="email" autocomplete="off" class="ipt ipt-email" placeholder="请输入名称 " onblur="checkname();">
                                <font color="red"><p class="tips" id="name_sp"></p></font>
                            </div>
                            <div class="form-control proclaim-loc js-proclaim-on">

                                <input type="password" name="password"  class="ipt ipt-pwd js-pass-pwd" placeholder="6-16位密码，区分大小写，不能用空格" id="pwd"  style="background-image:url('');
   background-position:right bottom">
                                <p class="tips" id="sp_pwd"><font color="red"></font></p>
                            </div>
                            <div class="form-control">
                                <input type="text" name="nickname" data-validate="nick" class="ipt ipt-nick" placeholder="昵称为2-18位，中英文、数字及下划线" id="nickname" >
                                <font color="red"><p class="tips" id="nick_sp"></p></font>
                            </div>

                            <div class="form-control">
                                <input type="text" name="email" data-validate="nick" class="ipt ipt-nick" placeholder="邮箱格式:@ . com" id="email" onblur="checkemail();">

                                <font color="red"><p class="tips" id="email_sp"></p></font>
                            </div>

                            <div class="form-control">
                                <input type="text" name="phone" data-validate="nick" class="ipt ipt-nick" placeholder="手机号为11位 " id="phone" onblur="checkphone();">
                                <font color="red"><p class="tips" id="phone_sp"></p></font>
                            </div>


                            <div class="form-control login-tspace clearfix">
                                <input type="submit"  id="" class="btn btn-red login-submit" value="注册">
                            </div>
                        </form>
                    </div>



                </div>
            </div>

        </div>
    </div>

</div>
<script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
<script>
    var flag=false;
    $('#username').blur(function(){
      //  alert(123);
        var username=$(this).val();
        if(username=='') {
            $('#name_sp').html('用户名非空');
            //alert(123);
            flag=true;
            return flag;
        }else{
            $('#name_sp').html('ok');
           // alert(456);
            return flag;
        }
    })
    var emailflag=false;
    $('#email').blur(function(){
        var email=$("#email").val();
        var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if(reg.test(email)){
           // alert(123)
            $("#email_sp").html('ok')
            emailflag=true;
            return emailflag;
        }else{
           // alert(456)
           // alert(456)
            $("#email_sp").html('格式错误')
            return emailflag;
        }
    })
    var phoneflag=false;
    $("#phone").blur(function(){
        var phone=$("#phone").val();
        var reg = /^1\d{10}$/;
        if(reg.test(phone)){
            $("#phone_sp").html('ok')
            phoneflag=true;
            return phoneflag;
        }else{
            $("#phone_sp").html('格式错误');
            return phoneflag;
        }
    })


    function show(){
        if(this.aa.password.type='password'){
            box.innerHTML = "<input type='text' name='password'  value="+this.aa.password.value+">";
            box3.innerHTML = "<a href='javascript:void(0)' onclick='hid();'>隐藏密码</a>";
        }
    }
    function hid(){
        if(this.aa.password.type='text'){
            box.innerHTML = "<input type='password' name='password'  value="+this.aa.password.value+">";
            box3.innerHTML = "<a href='javascript:void(0)' onclick='show();'>显示密码</a>";
        }
    }
</script>



