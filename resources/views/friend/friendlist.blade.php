<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>消息-慕课网</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="keywords" content="慕课网，慕课官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
<meta name="description" content="慕课网（IMOOC）是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />

<script type="text/javascript">
var OP_CONFIG={"module":"u","page":"messages","userInfo":{"uid":2098482,"nickname":"weibo_\u5076\u50cf_\u51e4\u9896_0","head":"http:\/\/img.mukewang.com\/user\/55915b920001a5c601800180-80-80.jpg","usertype":"1","roleid":0}};
var isLogin = 1;
var is_choice = "";
var seajsTimestamp="v=201604211612";
var ownName="837856359@qq.com"
</script>
<link rel="stylesheet" href="{{asset('static/lib/layer/1.6.0/skin/layer.css')}}" type="text/css" />
<script type="text/javascript">
<!--
var token = '62c08cecf999ff055ed97a5003389bff';
var u_Info = { uid:2098482,sex:1,age:0,teacher:0,img:'http://img.mukewang.com/user/55915b920001a5c601800180-200-200.jpg' };
//-->
</script>
<style>
#tempViewImg {
    max-height: 52px;
    height: 52px;
    height: expression(document.body.clientHeight>52"52px":"auto");
    overflow: hidden;
} 
</style>

<link rel="stylesheet" href="http://static.mukewang.com/static/css/??base.css,common/common-less.css,showface.css,u/message-less.css?v=1463035000" type="text/css" />
</head>
<body  id="index">
 @extends('layouts.master')
@section('sidebar')
@parent


<div id="main">

<div class="container">
    <ul id='navTab' class='n-tab clearfix'>
    <li>
        <a href='/u/2098482/notices'>通知</a>
    </li>
    <li data-index='0' class='active'>
        <a id="msg_new" href='javascript:;' class=''>消息</a>
        
    </li>
    <li data-index='1' class=''>
        <a id='msg_friends' href='javascript:;' class=''>好友</a>
    </li>
</ul>    
    <div class="clearfix msgbox">
        <div id="left_panel">
        
            <!--
            <ul id="left_panel_nav">
                <li id="msg_new"> <a class="active" href="#" title="消息"></a> </li>
                <li id="msg_friends"> <a href="#" title="好友"></a></li>
            </ul>
            -->
            
            <div class="left_panel_content">
                <div id="list_waper" class="ps-container">
                    <ul class="user_list" id="lastChat" style="display: none;">
                        <div class="msg-loading">
                            <div class="msg-loading-icon"></div>
                            <p>正在加载...</p>
                        </div>
                    </ul>
                    <ul style="" class="user_list" id="friends">
                    <li data-group="M" uid="10000" id="friends10000" class=""> 								
                    <div class="list-box">								
                    <img width="40" height="40" alt="慕女神" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"> 								
                    <div class="info">
                    <h5>慕女神</h5>
                    <p>我的私人秘书</p>
                    </div> 								
                    </div>							
                    </li><div class="groupBox">
                    <p class="groupChar">W</p>
                    </div>
                    <li data-group="W" uid="2098482" id="friends2098482" class="active"> 								
                    <div class="list-box">								
                    <img width="40" height="40" alt="weibo_偶像_凤颖_0" src="http://img.mukewang.com/user/55915b920001a5c601800180-40-40.jpg"> 								
                    <div class="info">
                    <h5>weibo_偶像_凤颖_0</h5>
                    <p>PHP开发工程师</p>
                    </div> 								
                    </div>							
                    </li>
                    </ul>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 320px;">
                <div class="ps-scrollbar-x" style="left: 0px; width: 0px;">
                    
                </div>
                </div>
                <div class="ps-scrollbar-y-rail" style="top: 0px; right: 2px; height: 620px;">
                <div class="ps-scrollbar-y" style="top: 0px; height: 0px;">
                    
                </div>
                </div>
                </div>
            </div>
        </div>
        <div id="chat_container">
            <div id="chat_content" class="chat_contentf ps-container"> 
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 805px;">
            <div class="ps-scrollbar-x" style="left: 0px; width: 780px;">
                
            </div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 2px; height: 560px;">
            <div class="ps-scrollbar-y" style="top: 0px; height: 0px;">
                
            </div>
            </div>
            <div class="userinfo_layer">         					
            <p class="headpic">
            <img width="180" height="180" src="http://img.mukewang.com/user/55915b920001a5c601800180-150-150.jpg"></p>
            <p class="name">weibo_偶像_凤颖_0</p>
            <p class="job">PHP开发工程师</p>							
            <p>男,地球人</p> 
            <p class="desc">这位同学很懒，什么也没有留下 - - !</p> 
            <div class="btn_area"> 						   
            <a target="_blank" class="btn btn-blue" href="/u/2098482/courses">访问主页</a>						   
            <a href="javascript:;" class="btn btn-green" uid="2098482" id="gotoSend">发消息</a>
            <a href="javascript:;" class="btn btn-red" id="rmfriend">删除好友</a>
            </div> 						
            </div>
            </div>
            <!--<div class="no_friend_right"><i class="icon-user"></i></div>-->
            <div id="chat_editor" style="display: none;">
                <form target="imageFrame" id="upLoadForm" enctype="multipart/form-data" action="/u/3071208/uploadimg?1463906708781" method="post">
                    <table cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <th> <div class="attach"><a style="margin-top:0" title="表情" onclick="return false" href="javascript:void(0)" id="sendEmojiIcon"><span class="icon-smail"></span></a></div>
                            </th>
                            <th> <div style="text-align:center" class="chat_upImg">
                                    <input type="file" title="图片" accept="image/jpeg,image/gif,image/x-png" id="msgUploadImg" name="imgFile">
                                </div>
                            </th>
                            <th> <div style="position:relative;width:490px;margin-top:8px;">
                                    <textarea placeholder="输入您要发送的消息..." maxlength="300" type="text" id="textInput" class="chatInput"></textarea>
                                    <div style="height:62px;display:none" id="msg_upImg_box"></div>
                                    <span style="display:none;width:10px;height:10px;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKBAMAAAB/HNKOAAAAA3NCSVQICAjb4U/gAAAAHlBMVEXKytn////z8/bX1+PU1OD19fjb2+Xz8/f19fnZ2ePstdLlAAAACXBIWXMAAAsSAAALEgHS3X78AAAAHHRFWHRTb2Z0d2FyZQBBZG9iZSBGaXJld29ya3MgQ1M26LyyjAAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMS8yNS8xM7kML+MAAAAvSURBVAiZY2AVFBRUYlBTFBQyYhByF1RRZBAsUUoSZBAUMiiEk2ARiGwYWCVYFwDX5gdZj1qR8wAAAABJRU5ErkJggg==) no-repeat 0 0;" id="imgDel"></span> </div>
                            </th>
                            <th> <a href="javascript:;" class="chatSend btn btn-large btn-green">发送</a> </th>
                        </tr>
                    </tbody></table>
                </form>
                <iframe width="0" height="0" frameborder="0" scrolling="no" name="imageFrame" id="imageFrame"></iframe>
            </div>
        </div>
        <div id="editor_msg"></div>
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
<script src="{{asset('passport/static/scripts/ssologin.js')}}"></script>
<script type="text/javascript" src="{{asset('static/sea-modules/seajs/seajs/2.1.1/sea.js')}}"></script>
<script type="text/javascript" src="{{asset('static/sea_config.js')}}?v=201604211612"></script>
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>





<div style="display: none">
</div>
</body>
</html>
