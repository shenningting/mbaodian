@section('sidebar')
<?php 
if(!isset($_SESSION)){
session_start(); 
}
?>
<div id="header">
    <div class="page-container" id="nav">
        <a href="http://www.mbaodian.com/" target="_self"><img src="{{asset('images/login.png')}}" style="float: left; padding-top:6px;"><a href="index" target="_self" class="hide-text"></a>
        <div class="g-menu-mini l">
            <a href="#" class="menu-ctrl">
                <i class="icon-menu"></i>
            </a>
            <ul class="nav-item l">
                <li><a href="shiti"  target="_self">试题</a></li>
                <li><a href="program"  target="_self">招聘</a></li>
                <li><a href="article"  target="_self">方法</a></li>
                <li><a href="company"  target="_self">简历</a></li>
		<li><a href="wenda" target="_self">答疑</a></li>
        <!--         <li><a href="/wiki"  target="_self">WIKI</a></li> -->
                            </ul>
        </div>
        <div id="login-area">
            <ul    <?php if(empty($_SESSION['username'])){ ?> class="header-unlogin clearfix" <?php }else{ ?> class="clearfix logined" <?php }?>>
                <li class="header-app">
                    <a href="/mobile/app">
                        <span class="icon-appdownload"></span>
                    </a>
                    <div class="QR-download">
                        <p id="app-text">面试宝典APP下载</p>
                        <!--<p id="app-type">iPhone / Android / iPad</p>-->
                        <img src="{{asset('images/erweima.png')}}">
                    </div>
                </li>
                
		<?php
                    if(empty($_SESSION['username'])){
                        ?>
                <li class="header-signin">
                    <a href="#login-modal" id="" data-category="UserAccount" data-action="login" data-toggle="modal" >登录</a>
                </li>
                <li class="header-signup">
                    <a href="#signup-modal" id="js-signup-btn" data-category="UserAccount" data-action="login" data-toggle="modal" >注册</a>
                </li>
                    <?php
                    }else{
                        ?>
 
                <li class="remind_warp">
                    <i class="msg_remind" style="display: none;"></i>
                    <a href="/sms/messagesone" target="_blank"><i class="icon-notifi"></i></a>
                </li>
        	    <li class="my_message">
                    <a target="_blank" title="我的消息" href="/sms/messages">
                        <span style="display: inline;" class="msg_icon">3</span>
                        <i class="icon-mail"></i>
                        <span style="display: none;">我的消息</span>
                    </a>
                </li>
                <li class="set_btn user-card-box">
                    <a target="_self" href="/u/3071208/courses" action-type="my_menu" class="user-card-item" id="header-avator">
                        <img width="40" height="40" src="{{asset('images/unknow-40.png')}}">
                        <i style="display: none;" class="myspace_remind"></i>
                        <span style="display: none;">动态提醒</span>
                    </a>
                    <div class="g-user-card">
                        <div class="card-inner">
                            <div class="card-top">
                                <a href="/u/3071208/courses"><img class="l" alt="凤颖" src="{{asset('images/unknow-160.png')}}"></a>
                                <a href="/u/3071208/courses"><span class="name text-ellipsis">凤颖</span></a>
                                <p class="meta">
					<a href="/u/3071208/experience">经验<b id="js-user-mp">550</b></a>
					<a href="/u/3071208/credit">积分<b id="js-user-credit">0</b></a>            </p>
                    
                                <a class="icon-set setup" href="/user/setprofile"></a>
                            </div>
                            <!--
                            <div class="card-links">
                                <a href="/space/index" class="my-mooc l">我的慕课<i class="dot-update"></i></a>
                                <span class="split l"></span>
                                <a href="/myclub/myquestion/t/ques" class="my-sns l">我的社区</a>
                            </div>
                            -->
                            <div class="card-history">
                                <span class="history-item">
                                    <span class="tit text-ellipsis">python进阶</span>
                                    <span class="media-name text-ellipsis">2-9 闭包</span>
                                    <i class="icon-clock"></i>
                                     <a class="continue" href="/video/6059">继续</a>
                                </span>
                            </div>
                            <div class="card-sets clearfix">
                                <a class="l mr30" target="_blank" href="/wenda/save">发问题</a>
                                <a class="l" target="_blank" href="/article/publish">写文章</a>
                                <a class="r" href="/out?referer=http://www.mbaodian.com/">退出</a>
                            </div>
                        </div>
                        <i class="card-arr"></i>
                    </div>
                </li>
 
                    <?php
                    }
                ?>
            </ul>
        </div>
        <div class='search-warp clearfix' style='min-width: 32px; height: 60px;'>
            <div class="search-area min" data-search="top-banner">
                <input class="search-input" data-suggest-trigger="suggest-trigger" placeholder="请输入想搜索的内容..." type="text" autocomplete="off">
                <input type='hidden' class='btn_search' data-search-btn="search-btn" />
                <ul class="search-area-result" data-suggest-result="suggest-result">
                </ul>
            </div>
            <div class='showhide-search' data-show='no'><i class='icon-search'></i></div>
        </div>
    </div>
</div>

@show

<div class="footer bg-white idx-minwidth">
  <div class="container">

      <div style="text-align:center;margin-top:-10px;padding-bottom:10px;">
      <!--可信网站图片LOGO安装开始-->
      <script src="{{asset('js/seallogo.dll')}}"></script>
      <!--可信网站图片LOGO安装结束-->
    </div>
  </div>
</div>


<div id="footer" >
    <div class="waper">
        <div class="footerwaper clearfix">
            <div class="followus r">
                <a class="followus-weixin" href="javascript:;"  target="_blank" title="微信">
                    <div class="flw-weixin-box"></div>
                </a>
                <a class="followus-weibo" href="#"  target="_blank" title="新浪微博"></a>
                <a class="followus-qzone" href="#" target="_blank" title="QQ空间"></a>
            </div>
            <div class="footer_intro l">
                <div class="footer_link">
                    <ul>
                        <li><a href="#" target="_blank">网站首页</a></li>
                        <li><a href="#" target="_blank">人才招聘</a></li>
                        <li> <a href="#" target="_blank">联系我们</a></li>
                        <li><a href="#" target="_blank">面试宝典</a></li>
                        <li><a href="#" target="_blank">合作专区</a></li>
                        <li><a href="#" target="_blank">关于我们</a></li>
                        <li> <a href="#" target="_blank">讲师招募</a></li>
                        <li> <a href="#" target="_blank">意见反馈</a></li>
                        <li> <a href="#" target="_blank">友情链接</a></li>
                    </ul>
                </div>
                <p>Copyright © 2016 mbaodian.com All Rights Reserved | 京ICP备16021576号-1</p>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('static/js/landing-min.js')}}?2013032917"></script>

<div style="text-align:center;clear:both"></div>


