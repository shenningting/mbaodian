<!DOCTYPE html>
<html><head>
<html xmlns:wb="http://open.weibo.com/wb">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>面试也用的到的：面向对象特点+作用+用法！_面试宝典</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375">
<meta property="wb:webmaster" content="c4f857219bfae3cb">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Cache-Control" content="no-transform ">
<meta name="Description" content="面试也用的到的：面向对象特点+作用+用法！ 刚学面向对象时，不知道什么是面向对象，只知道跟着讲师的例子走，最后了解了，会用了，却在面试时对其定义、特点、其有什么作用却一脸懵比，都知道有度娘，却搜的资料比较凌乱，小编在这就为初学面向对象的童鞋们带来了福利，从网上整理的精华。在这有什么没整理到的，希望能够">
<script src="{{asset('js/wpush.js')}}"></script><script src="{{asset('js/wrt.js')}}" async="" type="text/javascript"></script><script type="text/javascript">

      var OP_CONFIG={"module":"article","page":"details"};
  var isLogin = 0;
var is_choice = "";
  var seajsTimestamp="v=201603311625";
  
</script>


<script>
var pageInfo = {
  id: 6325
}
var user = {
  uid : "",
  img : "",
  nickname : ""
}
</script>

<link rel="stylesheet" href="{{asset('css/wa.css')}}" type="text/css">
<script src="{{asset('js/wjquery.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wseajs-text.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wcommon.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wstring.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wsuggest.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wstore.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wjson.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wim.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wdetails.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wsocket.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wprettify.js')}}" async="" charset="utf-8"></script><link href="{{asset('css/wprettify.css')}}" rel="stylesheet" charset="utf-8"><script src="{{asset('js/wverify-code.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/wshare.js')}}"></script><link href="{{asset('css/wshare_style0_16.css')}}" rel="stylesheet">
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

@extends('layouts.master')
@section('sidebar')
    @parent


<script>
var isLogin=0
</script>
<div class="opus-wrap clearfix">

<div class="detail-left l">
  <div class="detail-path">
    <a href="http://www.imooc.com/article">全部文章</a> \
    <a href="http://www.imooc.com/article/index/cid/106">后端开发</a> \
    <span>详情</span>
  </div>
  <div class="detail-content-wrap">
    <h1 class="detail-title"><?php echo $arr['a_title']?></h1>
    <div class="dc-addon clearfix">
      <div class="dc-profile l">
        <a class="cat" href="http://www.imooc.com/article/index/cid/106"><?php echo $arr['at_type']?></a>
        <span class="spacer"><?php echo $arr['a_addtime']?></span>
        <span class="spacer">1654浏览</span>
              </div>
      <div class="dc-sns r">
        <div style="display: none;" class="share-rl-tips share-posi js-share-statue">
                        <span>分享即可 +</span><strong>1积分</strong>
                        <span class="rule-arrow"></span>
                    </div>

        <var class="cutoff l">|</var>
                  <span id="js-praise" data-id="6325" class="dc-praise l">
           点赞</span>
          </span>
                <var class="cutoff l">|</var>
                              <span id="js-follow" data-id="6325" class="dc-follow l">
              <span>收藏</span>
            </span>
                          
      </div>
    </div>
    <div class="detail-content ">
      <p><?php echo $arr['a_con']?></p>
    </div>
  </div>
  <div class="larger-share" id="js-share-img" data-pic="">
    <ul class="share-wrap">
        <wb:share-button appkey="2011094984" addition="simple" type="icon" default_text="<?php echo $arr['a_title']?>"></wb:share-button></br>分享到微博
</ul>
      </div>
          <!-- <a href="javascript:;" class="js-share-weibo icon-nav icon-share-weibo" data-cmd="tsina" title="分享到新浪微博"></a> -->
       <!-- <p class="share-note">分享到新浪微博</p>-->



  </div>
    <div style="float:right" id="aping">
        <div>
            <h2 style="align-content: center;margin-top: 20px"><center><font    color="red">评论内容</font></center></h2>
        </div>
        <div style="margin-top: 10px">
            <?php foreach($aping as $kk=>$vv){?>
                <img src="{{asset('picture/ww.jpeg')}}" width="40px" height="40px"/>
                <span><?php echo  substr($vv['user_phone'],0,4)?>****<?php echo substr($vv['user_phone'],8,4)?></span>
                <h4><?php echo $vv['ap_con']?></h4>
                <?php }?>
        </div>

    </div>
    </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
  <div class="detail-feedback-wrap">
    <div class="df-title">评论</div>
    <div id="js-feedback-list-wrap" class="feedback-list">
        <div id="js-feedback-list"><div class="comment-box">
                <div class="df-ipt-wrap">
            <div class="feed-author l">
        <img src="{{asset('picture/wavatar_default.png')}}" alt="" width="40">
      </div>
      <div id="js-text-login" class="df-text df-text-login">
        <textarea class="ipt" id="ping" placeholder="请登录后，发表评论"></textarea>
        <div class="df-bottom clearfix">
          <!--<button id="tijiao" class="btn btn-green disabled r">提交</button>-->
          <input id="tijiao" class="btn btn-green r" value="提交">
        </div>
      </div>
      <input type="hidden" value="<?php echo $username?>" id="user">
      <input type="hidden" value="<?php echo $arr['a_id']?>" id="a_id">
    </div>
  </div>
</div>
<div class="detail-right r">
  <div class="aside-author">
    <div class="p clearfix">
      <a href="#" class="l" title="果果爱吃苹果">
        <img src="{{asset('picture/w5333a0d9000196ff02000200-100-100.jpg')}}" width="80">
      </a>
      <p>
        <a class="nick" href="#" title="果果爱吃苹果">果果爱吃苹果</a>
        <span>JAVA开发工程师</span>
      </p>
    </div>
    <p>
      这位童鞋很懒，什么也没有留下～～！
    </p>
  </div>
    <div class="other-article">
    <h2>作者的其它文章</h2>
    <ul>
            <li>
        <a href="#" title="利用java基础轻轻松松解决公司密码加密问题">利用java基础轻轻松松解决公司密码加密问题</a>
      </li>
            <li>
        <a href="#" title="慕女神css精华笔记">慕女神css精华笔记</a>
      </li>
            <li>
        <a href="#" title="10分钟入门html">10分钟入门html</a>
      </li>
          </ul>
  </div>
  </div>

</div><!--opus-wrap end-->

<div id="main">

</div>

@endsection
<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="#" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="#">
        <div class="elevator-app-box">
        </div>
    </a>
    <a class="elevator-top" href="javascript:;" style="display: none;" id="backTop"></a>
</div>



<!--script-->
<script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
      <script>
          $(document).on("click","#ping",function(){
              use=$("#user").val();
              if(use==0){
                  alert("请先登录");
                  location.href="index";
              }
          })
          $(document).on("click","#tijiao",function(){
              ping=$("#ping").val();
              a_id=$("#a_id").val();
              $.post('wping',{
                  ping:ping,
                  a_id:a_id
              },function(data){
                 //$("#aping").html(data)
                  var data=eval("("+data+")");
                  var rp='';
                  //rp+=' <div style="float:right" id="aping">';
                  rp+='<div id="aping">';
                  rp+='<h2 style="align-content: center;margin-top: 20px"><center><font    color="red">评论内容</font></center></h2>';
                  rp+='</div>';
                  rp+='<div style="margin-top: 10px">';
                  for(i in data){
                      rp+='<img src="{{asset('picture/ww.jpeg')}}" width="40px" height="40px"/>';
                      rp+='<span>'+data[i]["user_phone"].substr(0,3)+'****'+data[i]["user_phone"].substr(7,4)+'</span>';
                      rp+='<h4>'+data[i]['ap_con']+'</h4>';
                  }
                  rp+='</div>';
                  //rp+='</div>';
                  $("#aping").html(rp);
              })
          })
      </script>
<script src="{{asset('js/wssologin.js')}}"></script>
<script type="text/javascript" src="{{asset('js/wsea.js')}}"></script>
<script type="text/javascript" src="{{asset('js/wsea_config.js')}}"></script>
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
</script><script src="{{asset('wen_files/h.js')}}" type="text/javascript"></script><a href="http://tongji.baidu.com/hm-web/welcome/ico?s=f0cfcccd7b1393990c78efdeebff3968" target="_blank"><img src="wen_files/21.gif" height="20" width="20" border="0"></a>

</div><script src="wen_files/user.htm" type="text/javascript"></script><script src="  _files/iplookup.php" type="text/javascript"></script>
</body></html>
