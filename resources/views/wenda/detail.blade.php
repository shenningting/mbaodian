<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>详情</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375">
<meta property="wb:webmaster" content="c4f857219bfae3cb">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Cache-Control" content="no-transform ">

<meta name="Keywords" content="JavaScript">

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="<?= substr(public_path(),17);?>{{asset('js/push.js')}}"></script><script src="<?= substr(public_path(),17);?>/js/rt.js" async="" type="text/javascript"></script><script type="text/javascript">

      var OP_CONFIG={"module":"wenda","page":"detail","userInfo":{"uid":"3116310","nickname":"core3116310","head":"http:\/\/img.mukewang.com\/user\/56f9d3ae0001e1c701000100-80-80.jpg","usertype":"1","roleid":0}};
  var isLogin = 1;
var is_choice = "";
  var seajsTimestamp="";
    var ownName=""
  
</script>

<link rel="stylesheet" href="<?= substr(public_path(),17);?>{{asset('css/layerhxx.css')}}" type="text/css">


<link rel="stylesheet" href="<?= substr(public_path(),17);?>{{asset('css/ahxx.css')}}" type="text/css">
<script src="<?= substr(public_path(),17);?>/js/jquery_002.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/seajs-text.js" async="" charset="utf-8"></script><script src="i<?= substr(public_path(),17);?>/js/common.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/string.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/suggest.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/store.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/json.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/im.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/detail.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/socket.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/ueditor_002.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/index.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/layer.js" async="" charset="utf-8"></script><link href="<?= substr(public_path(),17);?>/css/layer_002hxx.css" rel="stylesheet" charset="utf-8"><script src="<?= substr(public_path(),17);?>/js/detail-common.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/wendalist.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/wendaGuide.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/jquery.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/modal.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/verify-code.js" async="" charset="utf-8"></script><script src="<?= substr(public_path(),17);?>/js/share.js"></script><link rel="stylesheet" type="text/css" href="<?= substr(public_path(),17);?>/css/ueditorhxx.css"><link href="<?= substr(public_path(),17);?>/css/share_style0_16hxx.css" rel="stylesheet"><script defer="defer" type="text/javascript" src="<?= substr(public_path(),17);?>/js/ZeroClipboard.js"></script></head>
<body style="background:#fff;">


@extends('layouts.master')
@section('sidebar')
@parent
<div style="" id="main">

    <script>
var quesname="div中文字浮动为什么在最右侧显示";   //问答名称
var url = 'http://www.mukewang.com' + window.location.pathname;
window._bd_share_config = {
    
   
};
</script>

<div style="" class="container qa-container clearfix">
    <div style="" class="qa-left l detail-left">
        <div style="" class="qa-left-wrap">
            <div class="qa-content detail-content" data-qid="313011">
                <div class="qa-content-inner ">
                    <div id="js-content-main">
                        <div class="detail-q-title clearfix">
                            <h1 class="js-qa-wenda-title detail-wenda-title l"><?php echo $arr['0']['t_title'];?></h1>
                            <!-- 编辑 -->

                                                    </div>
                        
                        <div id="js-qa-wenda" class="detail-wenda imgPreview rich-text">
                            
                            <span><?php echo $arr['0']['t_content']?></span>
                        </div>
                        <input type="hidden" id="tid" value="<?php echo $arr['0']['t_id']?>">
                    </div>

                                        <div class="qa-header detail-user-tips">
                        
                        <div class="qa-header-right r">
                            <!-- credit -->
                            <div style="display: none;" class="share-rl-tips share-posi js-share-statue">
                               
                            </div>
                            <!-- share -->
                            <div class="small-share l wd-share">
                                
                            </div>
                            <em class="split l"></em>
                            <!-- follow -->
                        </div>
                        <!-- 个人信息 -->
                        <div class="detail-user">
                            <span class="detail-provider">提问者</span>
                            
                            <a href="http://www.imooc.com/u/2965295/bbs" target="_blank" class="qa-author"><?php echo $arr_user['user_name'];?></a>
                           
                                                    </div>
                        
                    </div>
                </div>

                        </div>














            <div style="" id="js-qa-comment-input" class="detail-comment-input js-msg-context clearfix">
                <div id="add-answer" class="detail-ci-avator">
                <script src="<?= substr(public_path(),17);?>/js/jquery-1.9.1.js"></script>
                    <script src="<?= substr(public_path(),17);?>/ckeditor/ckeditor.js"></script>
                    <h3 class="answer-add-tip">添加回答</h3>
                    <textarea name="d_content" row="5" col="6"></textarea>
                    <a href="#" id="ques-submit-btn" class="btn btn-red link-btn publishbtn" >发布回答</a>
                </div>
                
                <div id="avator-wrap" class="detail-ci-avator answer-hidden">
                                        <img src="<?= substr(public_path(),17);?>/detail_files/56f9d3ae0001e1c701000100-80-80.jpg" alt="">
                    <div class="detail-r">
                        <span class="detail-name">core3116310</span>
                        <p class="detail-signal"></p>
                    </div>
                     </div>
                <div style="" id="js-reply-wrap" class="answer-hidden">
                    <div style="" id="js-reply-editor-box" class="wd-comment-box js-ci-inner  edui-imooc">
                    <div style="width: 780px; z-index: 999;" id="edui1" class="edui-editor  edui-imooc"></div></div>
                    <div id="js-qa-ci-footer" class="qa-ci-footer clearfix">
                        <span class="qa-tips l"></span>
                        <div class="qa-ci-footright">
                            <button id="js-wenda-ci-submit" class="btn btn-red detail-ans " data-qid="313011">回答</button>
                        </div>
                    </div>
                </div>
                

            </div>
            <!-- 回答数 -->
                                                <div class="ans_num"><?php echo count($arr_com);?>回答</div>
                                        <!-- 回答回复 start -->
                                  <?php foreach ($arr_com as $key => $val) {
                                 
                                  ?>
                         
                        <div id="aa">
                            <div class="ques-answer">
                    <div class="answer-con first" id="id_156829">
                        <div class="user-pic l">
                            <a href="http://www.imooc.com/u/1044131/bbs" target="_blank">
                                <img src="<?= substr(public_path(),17);?>/detail_files/567b7d9a0001eadd01000100-100-100.jpg" alt="?" width="40" height="40">
                            </a>
                        </div><!--.user end-->
                        <div class="detail-r">
                            <span class="time"><?php echo $val['com_addtime'];?></span>
                                                     <a class="detail-name" href="http://www.imooc.com/u/1044131/bbs" target="_blank"><?php echo $val['user_name'];?></a>
                                                                                     <!--  <p class="detail-signal">我也想变好啊，也想很厉害的会画画会弹吉他，我也很努...</p>-->
                        </div>

                        
                        <div class="answer-content rich-text imgPreview"><p><?php echo $val['com_content'];?><br></p></div>

                                                <div class="ctrl-bar js-msg-context clearfix js-reply-tool hide">
                            <div class="detail-editor-btns r">
                                <span class="qa-tips"></span>
                                <button class="btn btn-normal js-reply-cancel">取消</button>
                                <button class="btn btn-red js-reply-submit" data-id="156829">保存</button>
                            </div>
                        </div>
                        
                        <div class="ctrl-bar clearfix js-wenda-tool">
                        
                                <span class="agree-with " data-ques-id="313011" data-answer-id="156829" data-hasop="">



                                <b>赞同</b>
                                



                                </span>

                            <span class="oppose " data-ques-id="313011" data-answer-id="156829" data-hasop="">反对</span>

                            <span class="reply" data-replynum="0" data-reply-id="156829" data-ques-uid="2965295"><em>0</em>个回复</span>

                            
                            

                        </div><!--.ctrl-bar end-->

                        
                    </div><!--.answer-con end-->
                    <div class="reply-con">
                        <ul class="reply-list">
                            
                        </ul><!--.reply-list end-->
                        <div class="release-reply-con clearfix">
                                                                    <div class="user-pic">
                                        <a href="http://www.imooc.com/u/3116310/bbs" target="_blank">
                                            <img src="<?= substr(public_path(),17);?>/detail_files/56f9d3ae0001e1c701000100-100-100.jpg" alt="?" width="40" height="40">
                                        </a>
                                    </div>
                                                                <!--.user-pic end-->
                            <div class="user-name">
                                                                    <a href="http://www.imooc.com/u/3116310/bbs" target="_blank">core3116310</a>
                                                            </div>
                            <div class="textarea-con">
                                                                <textarea name="release-reply" id="release-reply" placeholder="写下你的回复"></textarea>
                                                            </div>
                            <p class="err-tip"></p>
                            <div class="userCtrl clearfix">
                                <div class="verify-code"></div>
                                <div class="do-reply-btn" data-answer-id="156829" data-ques-uid="2965295">回复</div>
                            </div>
                        </div><!--.release-reply-con end-->
                    </div><!--.reply-con end-->
                    
                </div>
            </div>
            <!-- 回答回复 end --><?php } ?>



        



            <div class="qa-comment-page">
                        </div>
        </div>
    </div>
    <div class="qa-right r">
        <div class="wenda-slider">
            <div class="quiz"><a class="js-quiz" href="<?= substr(public_path(),17);?>/save">我要提问</a></div>
            <!-- 相关问题 -->
                          <div class="panel about-ques">
                <div class="panel-heading">
                  <h2 class="panel-title">相关问题</h2>
                </div>
                
              </div>
                        <!-- 广告 -->
                                            <div class="advertisement">
                    <a href="http://www.imooc.com/wenda/detail/305892" data-ast="yuanwendetailright_1_192" target="_blank">
                        <img src="<?= substr(public_path(),17);?>/detail_files/5694738900010baf02800100.jpg" title="2015年度&lt;问答牛人团&gt;榜单">
                    </a>
                </div><!--.advertisement end-->
                                                                        <div class="recommend-class">
                    <div class="title clearfix">
                        <h3>相关分类</h3>
                    </div><!--title end-->
                    <ul class="cls-list">
                                                <li>
                            <div class="class-info">
                                <div class="class-icon">
                                    <a href="http://www.imooc.com/wenda/17" target="_blank">
                                        <img src="<?= substr(public_path(),17);?>/detail_files/563aff440001e80700900090.jpg" alt="JavaScript">
                                    </a>
                                </div><!--.class-icon end-->
                                <h4>
                                    <a href="http://www.imooc.com/wenda/17" target="_blank">JavaScript</a>
                                </h4>
                                <p class="follow-person">41582人关注</p>
                                <a href="javascript:void(0)" data-tag-id="17" class="follow ">关注</a>
                                
                            </div><!--.class-info end-->
                                                                                    <div class="desc">
                                <a class="desc-link" href="http://www.imooc.com/wenda/detail/312931" taget="_blank">这段代码里面+号的含义是什么~</a>
                                <i class="answer-num">7 回答</i>
                            </div>
                                                        <div class="desc">
                                <a class="desc-link" href="http://www.imooc.com/wenda/detail/313004" taget="_blank">大神求指导下，透明度没有变化，看了半天，还是不知道错在哪，T-T!</a>
                                <i class="answer-num">2 回答</i>
                            </div>
                                                                                </li><!--li end-->
                                            </ul><!--.cls-list end-->
                </div><!--.recommend-class end-->
                            
        </div>
    </div>
</div>

<div id="reply-box" style="display:none;">
    <div class="js-qa-reply-ibox qa-reply-ibox clearfix">
        <div class="qa-reply-iavator l">
                        <a href="http://www.imooc.com/myclub/otherquestion?uid=3116310" title="core3116310">
                <img src="<?= substr(public_path(),17);?>/detail_files/56f9d3ae0001e1c701000100-40-40.jpg" width="40" height="40">
            </a>
                    </div>
        <div class="qa-reply-iwrap">
            <div class="qa-reply-iarea">
                <textarea maxlength="2000" name="" id="" class="js-reply-ipt ipt" placeholder="写下你的评论..."></textarea>
            </div>
            <div class="qa-reply-ifoot clearfix">
                <div class="qa-reply-footright r">
                    <span class="qa-tips"></span>
                    <button class="btn-normal btn-mini js-ipt-cancel">取消</button>
                    <button class="btn-green btn-mini  js-ipt-submit">提交</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pop-tips-layer"></div>
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

  <div class="wd-scroll">
    <a href="#add-answer" class="answ">回答</a>
    <a href="http://www.imooc.com/wenda/save" class="ques">提问</a>
    <a href="javascript:void(0)" class="to-top" title="返回顶部"><i class="icon-up2"></i></a>
    <a href="http://www.imooc.com/user/feedback" class="feedback" title="意见反馈"><i class="icon-feedback"></i></a>
  </div>



<script type="text/javascript" charset="utf-8" src="<?= substr(public_path(),17);?>/js/ueditor.js"></script>

<!--script-->
<script src="<?= substr(public_path(),17);?>{{asset('js/ssologin.js')}}"></script>
<script type="text/javascript" src="<?= substr(public_path(),17);?>{{asset('js/sea.js')}}"></script>
<script type="text/javascript" src="<?= substr(public_path(),17);?>{{asset('js/sea_config.js')}}"></script>
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
</script><script src="<?= substr(public_path(),17);?>/js/h.js" type="text/javascript"></script><a href="http://tongji.baidu.com/hm-web/welcome/ico?s=f0cfcccd7b1393990c78efdeebff3968" target="_blank"><img src="<?= substr(public_path(),17);?>/detail_files/21.gif" border="0" width="20" height="20"></a>
<script>
(function(){
    var bp = document.createElement('script');
    bp.src = '//push.zhanzhang.baidu.com/push.js';
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
</div><script src="<?= substr(public_path(),17);?>/detail_files/user.htm" type="text/javascript"></script><script src="<?= substr(public_path(),17);?>/detail_files/iplookup.php" type="text/javascript"></script>


<div class="edui-imooc" style="position: fixed; left: 0px; top: 0px; width: 0px; height: 0px;" id="edui_fixedlayer"><div style="display: none;" id="edui41" class="edui-popup  edui-bubble edui-imooc" onmousedown="return false;"> <div id="edui41_body" class="edui-popup-body edui-imooc"> <iframe class="edui-imooc" style="position:absolute;z-index:-1;left:0;top:0;background-color: transparent;" src="<?= substr(public_path(),17);?>/detail_files/a_002.htm" width="100%" frameborder="0" height="100%"></iframe> <div class="edui-shadow edui-imooc"></div> <div id="edui41_content" class="edui-popup-content edui-imooc">  </div> </div></div></div><div style="position: absolute; left: 0px; top: -9999px; width: 1px; height: 1px; z-index: 999999999;" class="global-zeroclipboard-container" id="global-zeroclipboard-html-bridge"><object id="global-zeroclipboard-flash-bridge" name="global-zeroclipboard-flash-bridge" type="application/x-shockwave-flash" data="<?= substr(public_path(),17);?>/detail_files/ZeroClipboard.swf" width="100%" height="100%"><param name="allowScriptAccess" value="sameDomain"><param name="allowNetworking" value="all"><param name="menu" value="false"><param name="wmode" value="transparent"><param name="flashvars" value="trustedOrigins=www.imooc.com%2C%2F%2Fwww.imooc.com%2Chttp%3A%2F%2Fwww.imooc.com"></object></div></body></html>


<script>
    var d_content=CKEDITOR.replace("d_content");
    var tid=$("#tid").val();
    //alert(tid)
    $("#ques-submit-btn").click(function(){
     aa = d_content.getData();
     //alert(aa)
        $.post('<?= substr(public_path(),17);?>/hui',{
            aa:aa,tid:tid},
            function(data){
              // alert(data)
             $("#aa").html(data)
            }
        )
    })
</script>

@endsection