define(function(require, exports, module){
    var verifyCode = require('../common/verify-code.js');
    require('/static/lib/layer/1.6.0/layer.min.js');
    require('/static/lib/layer/1.6.0/skin/layer.css');


    function renderMoreBtn( num ){
        //渲染更多回复按钮
        return ['<div class="more-reply">点击展开后面<span>',num,'</span>条回复</div>'].join('');
    }

    function renderReply( quesUid , data ){
        //渲染回复
        //结构
        /*
         <li>
         <div class="user-pic">
         <a href="?" target="_blank">
         <img src="/static/img/appbg.jpg" alt="?"/>
         </a>
         </div><!--.user end-->
         <div class="user-info clearfix">
         <em>提问者</em>
         <a class="from-user" href="?">张三</a>
         <span>回复</span>
         <a class="to-user" href="?">李四</a>
         <span class="time">14小时前</span>
         </div>
         <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
         <div class="reply-btn">回复</div>
         </li>
         */
        //{#url_wenda_otherques#}?uid={$reply.uid}
        function isQuizzer( uid ){
            //判断是否是提问者
            if( quesUid==uid ){
                return '<em>提问者</em> ';
            }else{
                return '';
            }
        }
        function hasToUser( data ){
            //判断是否有touser
            if( data.to_username=='' ){
                return '';
            }else{
                return [
                    ' <span>回复</span> ',
                    isQuizzer( data.to_uid ),
                    '<a class="to-user" href="/u/',data.to_uid,'/bbs">',data.to_username,'</a>'
                ].join('');
            }
        }

        var str =""
        if(OP_CONFIG.userInfo && OP_CONFIG.userInfo.usertype==3){
            str='<a href="javascript:void(0)"  data-type="3" data-id="'+data.id+'" class="reply-del js-del">删除</a>'
        }
        var arr =[
            '<li>',
            '<div class="user-pic">',
            '<a href="/u/',data.from_uid,'/bbs" target="_blank">',
            '<img src="',data.from_pic,'" alt="',data.from_username,'"/>',
            '</a>',
            '</div>',
            '<div class="user-info clearfix">',
            isQuizzer( data.from_uid),
            '<a class="from-user" href="/u/',data.from_uid,'/bbs">',data.from_username,'</a>',
            hasToUser( data ),
            '<span class="time">',data.create_time,'</span>',
            '</div>',
            '<div class="reply-content">',data.description,'</div>',
            str,
            '<div class="reply-btn" data-uid="',data.from_uid,'" data-username="',data.from_username,'">回复</div>',
            '</li>'
        ];
        return arr.join('');
    }

    function renderReplyList( quesUid , data ){
        var arr = [];
        for( var i = 0 , len = data.length ; i < len ; i++ ){
            arr.push( renderReply( quesUid , data[i] ) );
        }
        return arr.join('');
    }




    $(function(){
        //新增问答右上角分享悬停效果，产品要求缩小触发范围，因此需要js处理
        $('.share-box .show-btn')
            .on('mouseenter',function(){
                var $this = $(this);
                var $root = $this.parent();
                if( $root.hasClass('hover') ){
                    return;
                }else{
                    $root.addClass('hover');
                }
            })
            .on('mouseleave',function( e ){
                e.stopPropagation();
                var $this = $(this);
                var $root = $this.parent();
                if( $root.hasClass('hover') ){
                    $root.removeClass('hover');
                }
            });
        $('.share-box .share-box-con')
            .on('mouseenter',function(){
                var $this = $(this);
                var $root = $this.parent();
                if( $root.hasClass('hover') ){
                    return;
                }else{
                    $root.addClass('hover');
                }
            })
            .on('mouseleave',function(){
                var $this = $(this);
                var $root = $this.parent();

                if( $root.hasClass('hover') ){
                    $root.removeClass('hover');
                }
            })
            .on('click',function(){
                var $this = $(this);
                var $root = $this.parent();

                if( $root.hasClass('hover') ){
                    $root.removeClass('hover');
                }
            });
        //compareEWHeight
        //比较元素的高度是否大于窗口高度
        //如果元素大于窗口高度，返回true
        //否则返回false
        function compareEWHeight( $elem ){
            var $w_h = $(window).height();
            var $h = $elem.height();
            //console.log($w_h,': ',$h);
            return $h > $w_h ? true : false;
        }

        //isInView
        //判断元素底边是否在窗口内
        //如果在窗口内，返回true
        //否则返回false
        function isInView( $elem ){
            var wh = $(window).height();
            var wt = $(window).scrollTop();
            var elem_h = $elem.height();
            var elem_t = $elem.offset().top;
            //console.log( wh,': ',wt,': ',elem_h,': ',elem_t);
            //console.log(wh+wt);
            //console.log( elem_h+elem_t);
            return (wh+wt)>(elem_h+elem_t)? true : false;
        }
        //为ctrl绑定滚动事件的处理函数
        var scrollHandle = (function(){
            var obj = {};
            var arr = [];//用来存储$answerId,防止同一个回答多次绑定scroll事件
            return function( $answerId , $ctrlBar ,$start_pos , $end_pos){
                //$start_pos 为 $ctrlBar的初始位置（top）减去answer-con的初始位置（top）
                var isScroll =false;//true为在滚动过程中，false为已经停止滚动
                obj.start = function(){
                    for(var i = 0,len = arr.length;i<len ;i++){
                        if(arr[i]==$answerId){
                            return;
                        }
                    }
                    arr.push( $answerId );
                    //console.log( arr );
                    var $root = $ctrlBar.parent();
                    var $w = $root.width();
                    var $l = $root.offset().left;
                    //$ctrlBar.css('left',$l+'px').css('width',$w+'px');
                    $(window).on('scroll.answer'+$answerId,function(){
                        var diff1 = $ctrlBar.offset().top;
                        var diff2 = $root.offset().top;
                        var diff = diff1-diff2;
                        //console.log($answerId +': '+diff1+': '+diff2+': '+(diff1-diff2));

                        if(isInView( $root )){
                            //如果元素完整高度都在窗口内，则ctrl-bar不再滚动
                            if($ctrlBar.hasClass('fixed')){
                                $ctrlBar.removeClass('fixed');
                                $ctrlBar.css('left',0).css('width','100%');
                            }
                        }else if( diff <= $start_pos){
                            if($ctrlBar.hasClass('fixed')){
                                $ctrlBar.removeClass('fixed');
                                $ctrlBar.css('left',0).css('width','100%');
                            }
                        }else if($(window).scrollTop()+$(window).height()-$root.offset().top < $start_pos ){
                            if($ctrlBar.hasClass('fixed')){
                                $ctrlBar.removeClass('fixed');
                                $ctrlBar.css('left',0).css('width','100%');
                            }
                        }else{
                            if($ctrlBar.hasClass('fixed')){
                                return;
                            }else{
                                $ctrlBar.addClass('fixed');
                                $ctrlBar.css('left',$l+'px').css('width',$w+'px');
                            }
                        }
                    });
                };
                obj.end = function(){
                    for( var i = 0,len = arr.length; i<len ; i++ ){
                        if( arr[i]==$answerId ){
                            arr.splice(i,1);
                            break;
                        }
                    }
                    //console.log( arr );
                    var $root = $ctrlBar.parent();
                    var $w = $root.width();
                    var $l = $root.offset().left;
                    if( $root.hasClass('extend') ){
                        $root.removeClass('extend');
                    }
                    if($ctrlBar.hasClass('fixed')){
                        $ctrlBar.removeClass('fixed');
                        $ctrlBar.css('left',0).css('width','100%');
                    }
                    $(window).off('scroll.answer'+$answerId);
                };
                return obj ;
            };
        })();
        //回复目标，默认为当前回答对应的用户
        var toUserInfo = {};
        //展开收起回复按钮
        var temphtml = '';

        $('.ques-answer')
            .on( 'succ' , 'textarea' , function(){
               $( this ).parent().next('.err-tip').text('');
            })
            .on( 'fail' , 'textarea' , function(e,msg){
               $( this ).parent().next('.err-tip').text(msg);
            })
            .on( 'click' , '.see-more', function(){
               var $root = $( this).parents('.answer-con');
               var $ctrlBar = $root.find('.ctrl-bar');
               var id = $root.attr('data-answer-id');
                var $shrink = $root.find('.shrink');
               //start_pos为内容未展开的时候，ctrlbar的top相对answer-con的top差值
               var start_pos = $ctrlBar.offset().top-$root.offset().top;
               //end_pos为内容未展开的时候，ctrlbar的top相对answer-con的top差值
               var end_pos = 0;
               //console.log('start_pos : '+start_pos);
               //显示全部
               if($root.hasClass('extend')){
                   return;
               }else{
                   $root.addClass( 'extend' );
                   $shrink.fadeIn(0);
                   end_pos = $ctrlBar.offset().top-$root.offset().top;
                   var obj = scrollHandle( id , $ctrlBar ,start_pos ,end_pos );
                   obj.start();
               }
           })
            .on( 'click' , '.shrink' , function(){
               //收起展开内容
                var $this = $(this);
               var $root = $this.parents('.answer-con');
               var $ctrlBar = $this.parent();
               var id = $root.attr('data-answer-id');
               var obj = scrollHandle( id , $ctrlBar );
               obj.end();
                $this.hide(0);
                $root.removeClass('extend');

            })
            .on( 'click' , '.reply-btn' , function(){
                toUserInfo.uid = $(this).attr('data-uid');
                toUserInfo.uname = $(this).attr('data-username');
                var $root = $(this).parents('.reply-con');
                var $textarea = $root.find('textarea');
                $textarea.focus().val('回复 '+toUserInfo.uname+'：').attr("touser",'回复 '+toUserInfo.uname+'：');
            })
            .on( 'click' , '.do-reply-btn' , function(){
                if(!isLogin){
                    $('#js-signin-btn').click();
                    return;
                }
               //发布回复
               //ajax接口参数
               //reply_id:回答的id
               //description:回复内容
               //from_uid:谁回复的
               //verify_code:验证码
                var $root = $( this ).parents('.reply-con');
                var $replyBtn = $root.prev('.answer-con').find('.reply');

                var $oldNum = $replyBtn.attr("data-replynum");


                var $list = $root.find('.reply-list');
                var $textArea = $root.find('textarea');
                var answerId = $( this ).attr('data-answer-id');
                var content = $textArea.val();
                var quesUid = $( this ).attr( 'data-ques-uid' );
                var data = {};
                //var reg = /^回复\s*\S+：/;
                    // if(reg.test( content )){
                    //     content=content.replace(reg,"");
                    //     data.to_uid = toUserInfo.uid;
                    // }else{
                    //     //data.to_uid = quesUid;
                    //     data.to_uid = "";
                    // }
                    var reg=$textArea.attr("touser");
                    if(content.indexOf(reg)!=-1){
                        content=content.replace(reg,"");
                        data.to_uid = toUserInfo.uid;
                    }else{
                        //data.to_uid = quesUid;
                        data.to_uid = "";
                    }
                    content = $.trim( content );
                    if(content.length<3){
                        $textArea.trigger('fail','字数不够，最少3个字');
                        return;
                    }
                    if( content.length > 1200){
                        $textArea.trigger('fail','超过字数上限，最多1200个字');
                        return;
                    }


                data.reply_id = answerId;
                data.description = content;

                if( $root.find('.js-verify-refresh').length!=0){
                    var verifyVal = $.trim(verifyCode.getResult($root.find('.verify-code')));
                    if(verifyVal.length==0){
                        $root.find('.verify-code').trigger('fail',"请输入验证码");
                        return ;
                    }else{
                        data.verify_code = verifyVal;
                    }
                }

                $.ajax({
                    url:'/wenda/wdsavereplycomment',
                    data:data,
                    type:"POST",
                    dataType:'json',
                    success:function(data){
                        //console.log( data );

                        if(data.result==0){
                            data.data.id=data.data.reply_id;
                            var rs = renderReply( quesUid , data.data );
                            var lisLength = $list.find('li').length;
                            if( lisLength != 3 ){
                                $list.append( rs );
                                if( !$replyBtn.hasClass('js-hasData')){
                                    $replyBtn.addClass('js-hasData');
                                }
                            }else{
                                if($root.find('.more-reply').length==0){
                                    $list.after(renderMoreBtn(1));
                                }else{
                                    $root.find('.more-reply span').text( parseInt($root.find('.more-reply span').text())+1);
                                }

                            }


                            $replyBtn.attr("data-replynum",parseInt($oldNum)+1)
                            $textArea.val('').removeAttr('touser').trigger('succ');
                            // var r = /\d+/;
                            // var strArr = r.exec(temphtml);
                            // var n = parseInt( strArr[0] )+1;
                            // temphtml = '<em class="js-num">'+n+'</em>个回复';
                        }else if(data.result==-1&&data.data==1){
                            //渲染验证码
                            verifyCode.renderVerifyCodeBlock($root.find('.verify-code'),'/wenda/getverifycode');
                            return;
                        }else if(data.result==-103002){
                            $root.find('.verify-code').trigger('fail',"验证码错误");
                            return;
                        }else{
                            layer.msg(msg, 1, 1);
                        }
                        $root.find('.err-tip').text('');
                        $root.find('.verify-code').html('');
                    }
                });
            })
            .on( 'click' , '.agree-with' , function(){
                if(!isLogin){
                    $('#js-signin-btn').click();
                    return;
                }
                //赞同
                var quesId = $( this).attr('data-ques-id');
                var answerId = $(this).attr('data-answer-id');
                var data = {};
                //op用来判断当前操作是在点赞，还是取消赞，true赞，false取消赞
                var op = true;
                var $this = $( this );
                data.ques_id = quesId;
                data.reply_id = answerId;
                if($this.hasClass('disabled')){
                    return;
                }
                $this.addClass('disabled');
                //data.op 0赞，1反对
                if( $(this).hasClass('active')){
                    //当前状态为已经赞同,将要取消
                    data.op = 'unsupport';
                    op = false;
                }else{
                    //当前状态为未赞同，将要赞同
                    data.op = 'support';
                    op = true;
                }
                $.ajax({
                    url:"/wenda/wdsupport",
                    type:"post",
                    dataType:"json",
                    data:data,
                    success:function(data){
                        //console.log( data );
                        if(data.result == 0){
                            var $opposeBtn = $this.siblings('.oppose');
                            if(op){
                                $this.addClass('active');
                                var $elem = $this.find('em');
                                if($elem.length==0){
                                    $this.append('<em>1</em>');
                                }else{
                                    var num = parseInt($elem.text());
                                    num = num+1; 
                                    $elem.text( num );                                   
                                }

                                
                                $this.find('b').text("已赞同");
                                if( $opposeBtn.hasClass('active')){
                                    $opposeBtn.removeClass('active').text('反对');
                                }
                            }else{
                                $this.removeClass('active');
                                var $elem = $this.find('em');
                                var num = parseInt($elem.text());
                                num = (num-1)<0?0:(num-1);
                                if(num==0){
                                    $elem.remove();
                                }else{
                                    $elem.text(num);
                                }
                                
                                $this.find('b').text('赞同');
                            }
                        }
                    },
                    complete:function(){
                        $this.removeClass('disabled');
                    }
                })
            })
            .on( 'click' , '.oppose' , function(){
                if(!isLogin){
                    $('#js-signin-btn').click();
                    return;
                }
                //反对
                var quesId = $( this).attr('data-ques-id');
                var answerId = $(this).attr('data-answer-id');
                var data = {};
                //op用来判断当前操作是在已经反对，还是取消反对，true取消反对，false反对
                var op = true;
                var $this = $( this );
                data.ques_id = quesId;
                data.reply_id = answerId;
                if($this.hasClass('disabled')){
                    return;
                }
                $this.addClass('disabled');
                //data.op 0赞，1反对
                if( $(this).hasClass('active')){
                    //当前是已经反对状态,将要取消反对
                    data.op = 'unoppose';
                    op = true;
                }else{
                    //当前是未反对状态，将要反对
                    data.op = 'oppose';
                    op = false;
                }
                $.ajax({
                    url:"/wenda/wdsupport",
                    type:"post",
                    dataType:"json",
                    data:data,
                    success:function(data){
                        //console.log( data );
                        if(data.result == 0){
                            if(op){
                                //取消反对
                                $this.removeClass('active').text("反对");
                            }else{
                                //反对
                                $this.addClass('active').text("已反对");
                                var $sptBtn = $this.siblings('.agree-with');
                                if( $sptBtn.hasClass('active')){
                                    var num = parseInt($sptBtn.find('em').text());
                                    num = (num-1)<0?0:(num-1);
                                    if(num==0){
                                        $sptBtn.removeClass('active').find('em').remove();
                                    }else{
                                        $sptBtn.removeClass('active').find('em').text(num);
                                    }
                                    
                                    $sptBtn.find('b').text('赞同');
                                }
                            }
                        }
                    },
                    complete:function(){
                        $this.removeClass('disabled');
                    }
                })
            })
            .on( 'click' , '.reply' , function(){
                var $this = $(this);
                var replyId = $this.attr('data-reply-id');
                var num = parseInt($this.find('em').text());
                var $replyCon = $this.parents('.answer-con').next('.reply-con');
                var quesUid = $this.attr('data-ques-uid');
                var $list = $replyCon.find('.reply-list');
                var $release = $replyCon.find('.release-reply-con');

                //console.log( replyId +": "+$replyCon);
                // js-show用来判断当前状态是否展开
                if( $this.hasClass('js-show')){
                    $replyCon.hide(0);
                    $this.html('<em class="js-num">'+$this.attr("data-replynum")+'</em>个回复').removeClass('js-show');
                    return;
                }

                $(".reply-con").hide(0)
                $(".js-show").html('<em class="js-num">'+$(".js-show").attr("data-replynum")+'</em>个回复').removeClass('js-show');

                $this.addClass('js-show');

                $this.text('收起回复');
                $replyCon.fadeIn( 200 );

                if( $this.hasClass('js-hasData')){
                    //判断是否已经加载过数据
                    var top = 0;
                    if( $list.find('li').length != 0){
                        top = $list.offset().top;
                    }else{
                        top = $release.offset().top;
                    }
                    $('html,body').animate({'scrollTop':top+'px'},200);
                    return;
                }
                //如果没加载过数据则加载
                if(num !=0){
                    $.ajax({
                        url:"/wenda/getcomments",
                        type:"get",
                        dataType:"json",
                        data:{reply_id:replyId},
                        success:function(data){
                            if(data.result=="0"){
                                var rs = renderReplyList( quesUid , data.data);
                                $list.append( rs );
                                //rs_num 还剩下多少条没有展示出来
                                var rs_num = num - 3;
                                //渲染更多按钮
                                if( rs_num > 0 ){
                                    var moreBtn = renderMoreBtn( rs_num );
                                    $list.after( moreBtn );
                                }
                                $this.addClass('js-hasData');

                            }
                        },
                        complete:function(){
                            //锚点到指定的位置
                            var top = 0;
                            if( $list.find('li').length != 0){
                                top = $list.offset().top;
                            }
                            // $('html,body').animate({'scrollTop':top+'px'},200);
                        }
                    })
                }else{
                    var top = 0;
                        top = $release.offset().top;
                    // $('html,body').animate({'scrollTop':top+'px'},200);
                }
            })
            .on( 'click' , '.more-reply' , function(){
                var $this = $( this );
                var $replyBtn = $(this).parents('.reply-con').prev('.answer-con').find('.reply');
                var replyId = $replyBtn.attr('data-reply-id');
                var quesUid = $replyBtn.attr('data-ques-uid');
                var $list = $this.siblings('.reply-list');
                //加载更多
                $.ajax({
                    url:"/wenda/getcomments",
                    type:"get",
                    dataType:"json",
                    data:{reply_id:replyId,page:2},
                    success:function(data){
                        if( data.result=="0" ){
                            var rs = renderReplyList( quesUid , data.data );
                            $list.append( rs );
                            $this.remove();
                        }
                    }
                });
            })
            .on( 'click' , '.share' , function(){
                $(this).siblings('.bdsharebuttonbox').fadeIn(200);
            })
            .on( 'click' , '.follow' , function(e){
                e.preventDefault();
                if(!isLogin){
                    $('#js-signin-btn').click();
                    return;
                }
                //.heart 未关注
                //.heart-revert 已经关注
                var $this = $(this);
                var quesId = $this.attr('data-ques-id');
                var len = $this.find('.heart').length;
                var childI = $this.find('i');
                var data = {};
                data.bbsId = quesId;

                if( len == 0 ){
                    //表示当前已经关注,将要取消
                    data.act = "del";
                }else{
                    data.act = "add";
                }
                $.ajax({
                    url:'/wenda/wendafollow',
                    type:"get",
                    dataType:"json",
                    data:data,
                    success:function(data){
                        //console.log( data );
                        if(data.result==0){
                            if( len == 0){
                                childI.attr('class', 'heart');
                                childI.html('关注');
                            }else{
                                childI.attr('class', 'heart-revert');
                                childI.html('取消关注');
                            }
                        }
                    }
                })

            })
            .on( 'click' , '.login-btn' , function(){
                $('#js-signin-btn').click();
            })
            .on( 'click' , '.register-btn' , function(){
                $('#js-signup-btn').click();
            })
            .on( 'click' , '.js-lgn' , function(){
                if(!isLogin){
                    $('#js-signin-btn').click();
                    return;
                }
            })
            .on( 'click' , '.js-rgr' , function(){
                if(!isLogin){
                    $('#js-signup-btn').click();
                    return;
                }
            })
            $("#main").on( 'click' , '.imgPreview img' , function(){
                $("body").append('<div class="mask" style="display:none;"></div>\
                    <div class="bigimg">\
                    <i title="关闭" class="close_upLyr"></i>\
                    </div>')
                var _url=$(this).attr("src");
                var _bigurl=_url;
                if(_url.indexOf("img.mukewang.com")!=-1||_url.indexOf("img.imooc.com")!=-1){//判断图片是否来自本地服务器
                    var _host="http://img.mukewang.com/"
                    if(_url.indexOf("img.imooc.com")!=-1){
                        _host="http://img.imooc.com/"
                    }
                    var arr=$(this).attr("src").split(_host)[1].split(".");
                    _bigurl=arr[0];
                    _bigurl=_bigurl.substring(0,_bigurl.length-8)+"00000000."+arr[1];
                    var originimg = _host+_bigurl;//原始图片
                }
                else{
                    var arr = $(this).attr('src');
                    var originimg = arr;
                }
                var imgnew = new Image();
                imgnew.onload=function(){
                    var w1=$(window).width();
                    var h1=$(window).height();

                    var w2=this.width;
                    var h2=this.height;

                    var oldw = this.width;
                    var oldh = this.height;

                    var t1=w1/h1;//屏幕比
                    var t2=w2/h2;//图片比

                    if(t1>t2){
                        if(h2>h1){
                            h2 = parseInt(h1-100);
                            w2 = parseInt(h2*t2);
                        }

                    }else{
                        if(w2>w1){
                            w2 = parseInt(w1-100);
                            h2 = parseInt(w2/t2);
                        }

                    }
                    $('.bigimg').css({'height':h2,'width':w2,'marginLeft':-w2/2,'marginTop':-h2/2});
                    setTimeout(function(){
                        $('.bigimg').append('<img src="'+originimg+'" class="ylpic" data-size="'+oldw+'|'+oldh+'" style="width:'+w2+'px;height:'+h2+'px"/>')
                    },300)
               }

                imgnew.src=originimg;
                $('.mask').show();
                $('.bigimg').show();
            })

            $('body').on('click','.close_upLyr,.mask',function(){
                $('.mask').remove()
                $('.bigimg').remove();
            });




        //右侧栏
        //提问按钮
        $('.js-quiz').on( 'click' , function(){
            if(isLogin){
                //isLogin声明在layout模板
                window.location.href="/wenda/save";
            }else{
                $('#js-signin-btn').click();
            }
        });

        //标签弹出层
        $('#tag-pop')
            .on( 'click' , '.js-close' , function(){
                $('#tag-pop').hide(0);
                var type = $('#tag-pop').attr('data-type');
                if( type=="allclass"){
                    return;
                }else{
                    if(isLogin){
                        window.location.reload();
                    }
                }
            })
            .on( 'click' , 'li' , function(){
                var type = $('#tag-pop').attr('data-type');
                if( type=="followtag" ){
                    if($(this).hasClass('active')){
                        $(this).removeClass('active');
                    }else{
                        $(this).addClass('active');
                    }
                }else{
                    //var tag = $.trim($(this).find('span').text());
                    var tagId = $(this).attr('data-tag-id');
                    window.open("/wenda/"+tagId);
                }

            })
            .on( 'click' , '.save-btn' , function(){
                var $root = $(this).siblings('.tag-list');
                var ids = [];
                var elems = $root.find('.active');
                $.each( elems , function( i , n ){
                    var tagId = $(n).attr('data-tag-id');
                    ids.push( tagId );
                });
                $.ajax({
                    url:"/wenda/customtag",
                    type:"post",
                    dataType:"json",
                    data:{tagIds:ids.join(",")},
                    success:function(data){
                        if(data.result==0){
                            window.location.reload();
                        }
                    }
                })
            });

        //打开全部分类
        function openTagPop( type ){
            if( type=="followtag" ){
                $('#tag-pop h3 span').text('关注我喜欢或专注的猿问分类');
            }
            if( type=="allclass" )
            {
                $('#tag-pop h3 span').text('全部分类');
                $('#tag-pop .save-btn').remove();
                $('#tag-pop .tag-list').find('.active').removeClass('active');
            }
            $('#tag-pop').attr('data-type',type).fadeIn(200);
        }
        //我的关注
        if($('.my-follow-class').length!=0){
            $('.my-follow-class')
                .on('click','.js-open',function(){
                    openTagPop( 'followtag' )
                })
                .on('click' , '.follow-immediately' , function(){
                    openTagPop('followtag')
                });
        }
        if( is_choice ){
            if(is_choice==1){
                openTagPop('allclass');
            }

        }

        //推荐分类
        $('.recommend-class')
            .on( 'click' ,'.all-cls', function(){
                openTagPop( 'allclass' );
            })
            .on( 'click' , '.follow' , function(){
                if( !isLogin ){
                    $('#js-signin-btn').click();
                    return;
                }
                var tagId = $(this).attr('data-tag-id');
                var $this = $(this);
                if( $(this).hasClass('disabled')){
                    //ajax发送中
                    return;
                }else{
                    $(this).addClass('disabled');
                }
                if( $(this).hasClass('active') ){
                    //已经关注分类
                    $.ajax({
                        url: '/wenda/canceltag',
                        data: {tagIds: tagId},
                        type: "post",
                        dataType: 'json',
                        success: function (data) {
                            if (data.result == 0) {
                                $this.removeClass('active');
                                if(OP_CONFIG.page=="wdcategory"){
                                    $this.text('关注');
                                }else{
                                    window.location.reload();
                                }

                            }
                        },
                        complete:function(){
                            $this.removeClass('disabled');
                        }
                    });

                }else{
                    //未关注分类
                    $.ajax({
                        url:'/wenda/followtag',
                        data:{tagIds: tagId },
                        type:"post",
                        dataType:'json',
                        success:function(data){
                            if(data.result==0){
                                $this.addClass('active');
                                if(OP_CONFIG.page=="wdcategory"){
                                    $this.text('取消关注');
                                }else{
                                    window.location.reload();
                                }
                            }
                        },
                        complete:function(){
                            $this.removeClass('disabled');
                        }
                    });
                }
            });
            //分享
            with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];

        //分享点击返回积分事件
        var shareEles = $(".bdsharebuttonbox a");
        var ajaxing = 0;
        var timer,interval=5000;
        shareEles.on("click",function(e){
            if(ajaxing) return;
            var sendId=$(this).parents(".bdsharebuttonbox").data("quesid");//问题的Id
            ajaxing=1;
            $.ajax({
                type: "post",
                url: '/course/courseshare',
                data: "id="+sendId+"&type="+4,
                success: function(res) {
                    ajaxing=0;
                },
                error: function() {
                    layer.msg('网络错误，请稍后再试', 1, 1);
                },
                complete: function() {
                    isAjax=0;
                }
            });
            e.preventDefault();
        })//分享积分 end
    });// dom ready end
});
