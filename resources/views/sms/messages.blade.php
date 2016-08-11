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
                    <ul id="lastChat" class="user_list"><li id="lastChat3071208" uid="3071208" class="active"> 						<div class="list-box">						<span class="icon-close2 msg-close"></span><img src="http://img.mukewang.com/user/545850c80001ebf202200220-40-40.jpg" alt="凤颖" width="40" height="40"> 				     	<div class="info"><h5>凤颖</h5><p class="theLastMsg">好友请求：加好友~</p></div>				     	</div>			 		 </li><li id="lastChat10000" uid="10000" class=""> 						<div class="list-box">						<img src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg" alt="慕女神" width="40" height="40"> 				     	<div class="info"><h5>慕女神</h5><p class="theLastMsg">小伙伴们，学习了 python 基础课程，快来学习"python正则表达式" http://www.imooc.com/learn/550，一步步迈入 python 开发。</p></div>				     	</div>			 		 </li></ul>
                    <ul id="friends" class="user_list" style="display:none"><li id="friends10000" uid="10000" data-group="M"> 								<div class="list-box">								<img src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg" alt="慕女神" width="40" height="40"> 								<div class="info"><h5>慕女神</h5><p>我的私人秘书</p></div> 								</div>							</li></ul>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 320px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 2px; height: 620px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
            </div>
        </div>
        <div id="chat_container">
            <div id="chat_content" class="ps-container"> <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 805px;"><div class="ps-scrollbar-x" style="left: 0px; width: 780px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 2px; height: 456px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div><ul id="userchatUl3071208" uid="3071208" class="userchatUl" style="display: block;"><li><div class="timeLine"> <strong style="width:130px;">2016-05-22</strong></div> </li><li class="you system JaddFriend4139483" msgid="4139483"> 							<div class="chat_avata"><a target="_blank" href="/u/3071208"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/545850c80001ebf202200220-40-40.jpg"></a></div> 							<div class="a_msg_info"><p><strong>凤颖</strong></p><pre class="comInfo">地球人、自由职业者、保密</pre><p>请求加你为好友</p><pre>附加消息：加好友~</pre> 								<div class="act_btn"><a href="/u/3071208/courses" class="btn btn-large btn-blue" target="_blank">访问主页</a> <button id="agree4139483" msgid="4139483" class="btn btn-green btn-agree">同意</button></div>								<i class="arrow_left_b"></i> 								</div> <small class="time">16:25</small> 						</li></ul><ul id="userchatUl10000" uid="10000" class="userchatUl" style="display: none;"><li><div class="timeLine"> <strong style="width:130px;">2015-06-29</strong></div> </li><li class="you "> 						<div class="chat_avata"><a target="_blank" href="/u/10000"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"></a></div> 						<div class="a_msg_info" id="2401127"><pre>Hi，亲爱的weibo_偶像_凤颖_0，欢迎你来到慕课网，如果你在学习的过程中有任何建议或问题，可以发消息给我！</pre><i class="arrow_left_b"></i>                    </div><small class="time">2015-06-29 22:52</small> 					</li><li><div class="timeLine"> <strong style="width:130px;">2015-08-11</strong></div> </li><li class="you "> 						<div class="chat_avata"><a target="_blank" href="/u/10000"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"></a></div> 						<div class="a_msg_info" id="2705634"><pre>hello，亲爱的慕课网小伙伴们，singwa老师这次给大家带来一门加薪神器——《PHP+Sphinx+MySQL实现全文检索—理论篇》，链接在此 <a href="http://www.imooc.com/view/463" class="hrefurl" target="_blank">http://www.imooc.com/view/463</a>  ，想加薪的小伙伴们，还不赶紧戳开来看！！</pre><i class="arrow_left_b"></i>                    </div><small class="time">2015-08-11 10:07</small> 					</li><li class="you "> 						<div class="chat_avata"><a target="_blank" href="/u/10000"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"></a></div> 						<div class="a_msg_info" id="2705636"><pre>hello，亲爱的慕课网小伙伴们，singwa老师这次给大家带来一门加薪神器——《PHP+Sphinx+MySQL实现全文检索—理论篇》，链接在此 <a href="http://www.imooc.com/view/463" class="hrefurl" target="_blank">http://www.imooc.com/view/463</a>  ，想加薪的小伙伴们，还不赶紧戳开来看！！</pre><i class="arrow_left_b"></i>                    </div><small class="time">2015-08-11 10:07</small> 					</li><li><div class="timeLine"> <strong style="width:130px;">2015-10-12</strong></div> </li><li class="you "> 						<div class="chat_avata"><a target="_blank" href="/u/10000"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"></a></div> 						<div class="a_msg_info" id="3071544"><pre>各位小伙伴，《PHP实现微信公众平台开发—提升篇》 <a href="http://www.imooc.com/view/509" class="hrefurl" target="_blank">http://www.imooc.com/view/509</a> 课程源代码已分享给大家，请各位小伙伴自行去“资料下载”区下载。友情提示：资料下载区在视频播放区域右下方的位置^_^</pre><i class="arrow_left_b"></i>                    </div><small class="time">2015-10-12 10:56</small> 					</li><li><div class="timeLine"> <strong style="width:130px;">2015-10-13</strong></div> </li><li class="you "> 						<div class="chat_avata"><a target="_blank" href="/u/10000"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"></a></div> 						<div class="a_msg_info" id="3078208"><pre>各位小伙伴，《PHP实现页面静态化》 <a href="http://www.imooc.com/view/330" class="hrefurl" target="_blank">http://www.imooc.com/view/330</a> 课程源代码已分享给大家，请各位小伙伴自行去“资料下载”区下载。友情提示：资料下载区在视频播放区域右下方的位置^_^</pre><i class="arrow_left_b"></i>                    </div><small class="time">2015-10-13 15:38</small> 					</li><li><div class="timeLine"> <strong style="width:130px;">2015-11-26</strong></div> </li><li class="you "> 						<div class="chat_avata"><a target="_blank" href="/u/10000"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"></a></div> 						<div class="a_msg_info" id="3268552"><pre>小伙伴们，学习了 python 基础课程，快来学习"python正则表达式" <a href="http://www.imooc.com/learn/550" class="hrefurl" target="_blank">http://www.imooc.com/learn/550</a>，一步步迈入 python 开发。</pre><i class="arrow_left_b"></i>                    </div><small class="time">2015-11-26 11:29</small> 					</li><li class="you "> 						<div class="chat_avata"><a target="_blank" href="/u/10000"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"></a></div> 						<div class="a_msg_info" id="3268560"><pre>小伙伴们，学习了 python 基础课程，快来学习"python正则表达式" <a href="http://www.imooc.com/learn/550" class="hrefurl" target="_blank">http://www.imooc.com/learn/550</a>，一步步迈入 python 开发。</pre><i class="arrow_left_b"></i>                    </div><small class="time">2015-11-26 11:31</small> 					</li><li class="you "> 						<div class="chat_avata"><a target="_blank" href="/u/10000"><img width="40" height="40" class="img_border_one" src="http://img.mukewang.com/user/55668b080001803f01800180-40-40.jpg"></a></div> 						<div class="a_msg_info" id="3268569"><pre>小伙伴们，学习了 python 基础课程，快来学习"python正则表达式" <a href="http://www.imooc.com/learn/550" class="hrefurl" target="_blank">http://www.imooc.com/learn/550</a>，一步步迈入 python 开发。</pre><i class="arrow_left_b"></i>                    </div><small class="time">2015-11-26 11:33</small> 					</li></ul></div>
            <!--<div class="no_friend_right"><i class="icon-user"></i></div>-->
            <div id="chat_editor" style="display: none;">
                <form method="post" action="/u/2098482/uploadimg?1463905816546" enctype="multipart/form-data" id="upLoadForm" target="imageFrame">
                    <table cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <th> <div class="attach"><a id="sendEmojiIcon" href="javascript:void(0)" onclick="return false" title="表情" style="margin-top:0"><span class="icon-smail"></span></a></div>
                            </th>
                            <th> <div class="chat_upImg" style="text-align:center">
                                    <input type="file" name="imgFile" id="msgUploadImg" accept="image/jpeg,image/gif,image/x-png" title="图片">
                                </div>
                            </th>
                            <th> <div style="position:relative;width:490px;margin-top:8px;">
                                    <textarea class="chatInput" id="textInput" type="text" maxlength="300" placeholder="输入您要发送的消息..." style="height: 34px; overflow-y: hidden;"></textarea>
                                    <div id="msg_upImg_box" style="height:62px;display:none"></div>
                                    <span id="imgDel" style="display:none;width:10px;height:10px;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKBAMAAAB/HNKOAAAAA3NCSVQICAjb4U/gAAAAHlBMVEXKytn////z8/bX1+PU1OD19fjb2+Xz8/f19fnZ2ePstdLlAAAACXBIWXMAAAsSAAALEgHS3X78AAAAHHRFWHRTb2Z0d2FyZQBBZG9iZSBGaXJld29ya3MgQ1M26LyyjAAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMS8yNS8xM7kML+MAAAAvSURBVAiZY2AVFBRUYlBTFBQyYhByF1RRZBAsUUoSZBAUMiiEk2ARiGwYWCVYFwDX5gdZj1qR8wAAAABJRU5ErkJggg==) no-repeat 0 0;"></span> </div>
                            </th>
                            <th> <a class="chatSend btn btn-large btn-green" href="javascript:;">发送</a> </th>
                        </tr>
                    </tbody></table>
                </form>
                <iframe width="0" height="0" id="imageFrame" name="imageFrame" frameborder="0" scrolling="no"></iframe>
            </div>
        <p id="nofriendbox" class="cue" style="display: none;">你已经不在对方好友列表中</p></div>
        <div id="editor_msg"></div>
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
<script src="{{asset('passport/static/scripts/ssologin.js')}}"></script>
<script type="text/javascript" src="{{asset('static/sea-modules/seajs/seajs/2.1.1/sea.js')}}"></script>
<script type="text/javascript" src="{{asset('static/sea_config.js')}}?v=201604211612"></script>
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>





<div style="display: none">
</div>
</body>
</html>
