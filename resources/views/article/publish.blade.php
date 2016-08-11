<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>发布文章 - 面试宝典网</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375">
<meta property="wb:webmaster" content="c4f857219bfae3cb">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Cache-Control" content="no-transform ">
<meta name="keywords" content="面试宝典，面试宝典官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程">
<meta name="description" content="面试宝典网（MBAODIAN）是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。">

<script src="{{asset('js/push.js')}}"></script><script src="{{asset('js/prt.js')}}" async="" type="text/javascript"></script><script type="text/javascript">

    var OP_CONFIG={"module":"article","page":"publish","userInfo":{"uid":"3116765","nickname":"qq_\u672c\u5bab\u672a\u6b7b\u4f11\u60f3\u7eb3\u59be_03116765","head":"http:\/\/img.mukewang.com\/user\/56f9e5ab0001e7b101000100-80-80.jpg","usertype":"1","roleid":0}};
    var isLogin = 1;
    var is_choice = "";
    var seajsTimestamp="v=201603311624";
    var ownName="3165819322@qq.com"
    var old_label = null;
</script>
<link rel="stylesheet" href="css/pa.css" type="text/css">
<script src="{{asset('js/pjquery.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/pseajs-text.js')}}" async="" 
charset="utf-8"></script><script src="{{asset('js/pcommon.js')}}" asy
nc="" charset="utf-8"></script><script src="{{asset('js/ps
tring.js')}}" async="" charset="utf-8"></script><script sr
c="{{asset('js/psuggest.js')}}" async="" charset="utf-8"></scr
ipt><script src="{{asset('js/pstore.js')}}" async="" charset="utf-8"></script><s
cript src="{{asset('js/pjson.js')}}" async="" charset="utf-8"></script><script src="{{asset('j
s/pim.js')}}" async="" charset="utf-8"></script><script src
="{{asset('js/ppublish.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/psocket.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/pmodal.js')}}" async="" charset="utf-8"></script><script src="{{asset('js/pwebuploader.js')}}" async="" charset="utf-8"></script><link href="{{asset('css/pwebuploader.css')}}" rel="stylesheet" charset="utf-8"><script src="{{asset('js/pMarkdown_004.js')}}" async="" charset="utf-8"></script><link href="{{asset('css/peditor.css')}}" rel="stylesheet" charset="utf-8"><script src="{{asset('js/pprettify.js')}}" async="" charset="utf-8"></script><link href="{{asset('css/prettify.css')}}" rel="stylesheet" charset="utf-8"></head>
<body>

@extends('layouts.master')
@section('sidebar')
    @parent


<script>
    var isLogin=1
</script>
<div class="opus-wrap clearfix">
<form action="add" method="post" enctype="multipart/form-data">
    <div class="article-left l">
        <h1 class="article-title">发布文章</h1>
        <div class="article-form">
            <div class="form-group clearfix">
                <label for="art-title" class="form-label l"><span>*</span>标题</label>
                <div class="form-ipt-wrap">
                    <input id="art-title" name="a_title" class="art-title" placeholder="请输入标题" type="text">
                    <p class="form-ipt-error"></p>
                </div>
            </div>
            <div class="form-group clearfix">
                <label for="" class="form-label l"><span>&nbsp;</span>封面</label>
                <div class="form-ipt-wrap">
                    <div class="face-upload clearfix">

                                <input type="file" name="a_logo">


                       </div>
                    <div id="js-face-reault" class="face-result">
                    </div>
                    <input id="art-face" type="hidden">
                </div>
            </div>
            <div class="form-group clearfix">
                <label for="art-cat" class="form-label l"><span>*</span>栏目</label>
                <div class="form-ipt-wrap">
                    <select name="a_type" id="art-cat">
                        <option selected="selected"  name="a_type">请选择栏目</option>
                        <?php foreach($ar_type as $k=>$v){?>
                        <option value="<?php echo $v['at_id']?>"><?php echo $v['at_type']?></option>
                        <?php } ?>
                    </select>
                    <p class="form-ipt-error"></p>
                </div>
            </div>
            <div class="form-group clearfix">
                <label for="" class="form-label l"><span>*</span>内容</label>
                <div class="form-ipt-wrap edit-area">
                    <div class="tip">本地保存成功 <i class="icon-close"></i></div>
                    <div id="js-mk" class="mk-container">
                        <div id="js-wmd-wrap-js-mk" class="wmd-wrap">

                            <div id="js-wmd-input-wrap-js-mk" class="wmd-input-wrap">
                                <textarea id="wmd-input-js-mk" name="a_con"></textarea>
                            </div>
                            <div id="js-wmd-preview-wrap-js-mk" class="wmd-preview-wrap">
                                <div id="wmd-preview-js-mk" class="wmd-preview"></div>
                            </div>
                        </div>
                    </div>
                    <p class="form-ipt-error"></p>
                </div>
            </div>
            <div class="tag-selector">
                <label>标签</label>
                <div class="tag-selector-wrap">
                    <div class="target-box clearfix" id="biao">
                    </div>
                    <p class="tip">您最多可以从以下选择3个标签哟！</p>
                    <div class="tag-box clearfix">
                    <?php foreach($a_lei as $k=>$v){?>
                        <span tag-id="12" name="al_name" id="al_name" value="<?php echo $v['al_name']?>"><?php echo $v['al_name']?></span>
                    <?php } ?>
                    </div>
                </div><!--tag-selector-wrap end-->
            </div><!--tag-selector end-->
            <div class="form-group form-bottom">
                <label for="" class="form-label l"></label>
                <div class="form-ipt-wrap">
                    <input type="submit" class="btn btn-green" value="提交"><span class="submit-tip js-submit-tip"></span>        <p id="js-msg" class="form-ipt-error"></p>
                </div>
            </div>
        </div>
    </div>
</form>
    <div class="article-right r">
        <div class="article-help">
            <h1 class="article-title">投稿须知</h1>
            <ol>
                <li>文章类型：技术、设计/交互、产品、与IT相关的任何学习心得、技术分享、职场经验、项目案例、甚至慕课网自学的励志故事等类型均可；</li>
                <li>拒绝广告：文章内容必须健康，符合国家相关法律法规规定，谢绝任何形式软文、公关稿、新闻稿；</li>
                <li>尊重版权：投稿作品必须为原创，否则慕课网有权拒绝发表或在发表后协助原版权所有者追究其法律责任；</li>
                <li>排版：正文配图务必从本地上传，并保证清晰，请勿超过2M（图片不得添加任何形式广告水印，否则审稿工作人员有权删除）；</li>
                <li>审核时间：您发布的文章均需经工作人员审核；审核通过后，如需再修改，文章将再次进入审核；我们承诺会在投稿后的2个工作日内审核完毕；</li>
                <li>其他：审核通过后，请勿随意编辑文章，若编辑文章过于频繁，慕女神将拒绝发布哦（如果是软文/新闻稿/公关稿，小编将直接删除），谢谢理解。</li>
            </ol>
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
    <a class="elevator-top" href="javascript:;" style="display:none" id="backTop"></a>
</div>



<script src="{{asset('js/pMarkdown.js')}}"></script>
<script src="{{asset('js/pMarkdown_002.js')}}"></script>
<script src="{{asset('js/pMarkdown_003.js')}}"></script>

<!--script-->
<script src="{{asset('js/pssologin.js')}}"></script>
<script type="text/javascript" src="{{asset('js/psea.js')}}"></script>
<script type="text/javascript" src="{{asset('js/psea_config.js')}}"></script>
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>

<div style="display: none">
<script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
<script>
    $(document).on("click","#al_name",function(){
        var a=$(this).attr("value")
        $("#biao").append(a)

    })
</script>

</body></html>