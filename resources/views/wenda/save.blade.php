<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>面试宝典-提问</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375">
<meta property="wb:webmaster" content="c4f857219bfae3cb">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Cache-Control" content="no-transform ">
<meta name="Keywords" content="">
<meta name="Description" content="">



<script src="{{asset('js/push.js')}}"></script><script src="{{asset('js/rt.js')}}" async="" type="text/javascript"></script><script type="text/javascript">

      var OP_CONFIG={"module":"wenda","page":"save","userInfo":{"uid":"3116310","nickname":"core3116310","head":"http:\/\/img.mukewang.com\/user\/56f9d3ae0001e1c701000100-80-80.jpg","usertype":"1","roleid":0}};
  var isLogin = 1;
var is_choice = "";
  var seajsTimestamp=" ";
    var ownName=" "
  
</script>


<link rel="stylesheet" href="css/ahx.css" type="text/css">
<script src="{{asset('js/jquery.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/seajs-text.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/common.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/string.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/suggest.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/store.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/json.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/im.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/save.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/socket.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/autocomplete.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/verify-code.js')}}" async="" charset="utf-8"></script><link rel="stylesheet" type="text/css" href="{{asset('css/ueditorhx.css')}}"><script defer="defer" type="text/javascript" src="{{asset('js/codemirror.js')}}"></script><link href="{{asset('css/codemirrorhx.css')}}" type="text/css" rel="stylesheet"><script defer="defer" type="text/javascript" src="{{asset('js/ZeroClipboard.js')}}"></script></head>
<body style="background:#fff;">

@extends('layouts.master')
@section('sidebar')
@parent


<div style="" id="main">

<div style="" class="container clearfix">
    <div style="" class="l bbs-main">
      <div style="" class="sucesspage">
        <h2 class="new-save-title">提问标题</h2>
        <div style="" id="js-inputques" class="inputques">
               <div class="quesdetail clearfix">
                  <span class="ques-label first-label">*</span>
                  <div class="question-area">
                    <input id="t_title" class="ipt autocomplete" maxlength="255" name="title" placeholder="请一句话说明你的问题，以问号结尾" type="text">
                    <p class="errortip"></p>
                    <dl style="display: none;" class="send-area-result"></dl>
                  </div>
               </div>
                <div style="" class="quesdetail mbottom">
                  <h4 class="new-save-title">     &nbsp;&nbsp;&nbsp;&nbsp;提问内容:</h4>


                 <script src="{{asset('js/jquery-1.9.1.js')}}"></script>
                    <script src="ckeditor/ckeditor.js"></script>

                 <body>
                    <textarea name="t_content" row="5" col="6"></textarea>
                </body>
                </div>
                <div class="mbottom">
                <h4 class="new-save-title">     &nbsp;&nbsp;&nbsp;&nbsp;所属学院:</h4>
                  <div id="tag-title" class="new-tags ques-tag defaultbox">
                    
                    <div id="js-tags" class="taglist clearfix">
                          





                <select name="pro" id="pro" class="select">
                    <option value="0">请选择</option>
                        @foreach($pro as $k=>$v)
                            <option value="<?php echo $v['d_id'];?>"><?php echo $v['d_name']?></option>
                        @endforeach
                </select>  







                   </div>
                    
                  </div>
               </div>
        </div>
        <div class="verify-box clearfix">
          <span class="ques-label l">_</span>
          <div class="verify-code"></div>
        </div>
        <div class="saveques-bottom">
          <a href="javascript:void(0)" id="ques-submit-btn" class="btn btn-red link-btn publishbtn" >发布提问</a>
          <p class="global-errortip js-global-error"></p>
        </div>
      </div>
     </div>
    <div class="r bbs-slide">
      <div class="panel bbs-sendques">
        <div class="panel-body">
          <h1>提问注意事项</h1>
          <dl>
            <dd>1、大家每天可以免费提出问题</dd>
            <dd>2、您是来解决问题？请先搜索是否已经有同类问题吧。这样您就省心少打字。</dd>
            <dd>3、没找到是么？就在发问题时精确描述你的问题，不要写与问题无关的内容哟；</dd>
            <dd>4、更热衷于解达您想要的答案。能引起思考和讨论的知识性问题；</dd>
            <dt>问答禁止这些提问</dt>
            <dd>1、禁止发布求职、交易、推广、广告类与问答无关信息将一律清理。</dd>
            <dd>2、尽可能详细描述您的问题，如标题与内容不符，或与问答无关的信息将被删除扣分。</dd>
            <dd>3、问答刷屏用户一律冻结帐号</dd>
          </dl>
        </div>
      </div>
    </div>
    <!-- error-pop -->
    <div class="pop-tips-layer"></div>
</div>
</div>
<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="http://www.imooc.com/user/feedback" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="http://www.imooc.com/mobile/app">
        <div class="elevator-app-box">
        </div>
    </a>
    <a class="elevator-top" href="javascript:;" style="display:none" id="backTop"></a>
</div>



<script type="text/javascript" src="{{asset('js/sea.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sea_config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('js/ueditor_002.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('js/ueditor.js')}}"> </script>
<script type="text/javascript" charset="utf-8" src="{{asset('js/zh-cn.js')}}"></script>
<!--<script type="text/javascript" charset="utf-8" src="/static/lib/ueditor/ueditor.final.min.js"></script>-->
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>
<div style="display: none">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Ff0cfcccd7b1393990c78efdeebff3968' type='text/javascript'%3E%3C/script%3E"));
(function (d) {
window.bd_cpro_rtid="rHT4P1c";
var s = d.createElement("script");s.type = "text/javascript";s.async = true;s.src = location.protocol + "//cpro.baidu.com/cpro/ui/rt.js";
var s0 = d.getElementsByTagName("script")[0];s0.parentNode.insertBefore(s, s0);
})(document);
</script><script src="{{asset('js/h.js')}}" type="text/javascript"></script><a href="http://tongji.baidu.com/hm-web/welcome/ico?s=f0cfcccd7b1393990c78efdeebff3968" target="_blank"><img src="{{asset('images/21.gif')}}" border="0" width="20" height="20"></a>
<script>
(function(){
    var bp = document.createElement('script');
    bp.src = '//push.zhanzhang.baidu.com/push.js';
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
</div><script src="save_files/user.htm" type="text/javascript"></script><script src="save_files/iplookup.php" type="text/javascript"></script>
<div class="edui-imooc" style="position: fixed; left: 0px; top: 0px; width: 0px; height: 0px;" id="edui_fixedlayer"><div style="display: none;" id="edui43" class="edui-popup  edui-bubble edui-imooc" onmousedown="return false;"> <div id="edui43_body" class="edui-popup-body edui-imooc"> <iframe class="edui-imooc" style="position:absolute;z-index:-1;left:0;top:0;background-color: transparent;" src="../save_files/a_002.htm" width="100%" frameborder="0" height="100%"></iframe> <div class="edui-shadow edui-imooc"></div> <div id="edui43_content" class="edui-popup-content edui-imooc">  </div> </div></div></div><div style="position: absolute; left: 0px; top: -9999px; width: 1px; height: 1px; z-index: 999999999;" class="global-zeroclipboard-container" id="global-zeroclipboard-html-bridge"><object id="global-zeroclipboard-flash-bridge" name="global-zeroclipboard-flash-bridge" type="application/x-shockwave-flash" data="../save_files/ZeroClipboard.swf" width="100%" height="100%"><param name="allowScriptAccess" value="sameDomain"><param name="allowNetworking" value="all"><param name="menu" value="false"><param name="wmode" value="transparent"><param name="flashvars" value="trustedOrigins=www.imooc.com%2C%2F%2Fwww.imooc.com%2Chttp%3A%2F%2Fwww.imooc.com"></object></div></body></html>
<script>
    var t_content=CKEDITOR.replace("t_content");
    
    $("#ques-submit-btn").click(function(){
        var t_title=$("#t_title").val();
        var pro=$("#pro").val();
        if(pro==0){
          alert('方向不能为空')
        }else{
          aa = t_content.getData();
        $.post('/tiwen',{
            t_title:t_title,aa:aa,pro:pro},
            function(data){
               if(data=='1'){

                 location.href='/canon/public/wenda'
               }else{

               }
            }

     
        ) }
    })
</script>
@endsection




















