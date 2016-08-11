define(function(require) {
  require('lib/pretty/prettify.js');
  require('lib/pretty/prettify.css');
  var verifyCode = require('../common/verify-code.js');
  prettyPrint();

  function loadFeedback(page) {
    page = page || 1;
    $.ajax({
      url:'/article/ajaxcomment',
      type:'post',
      dataType: 'json',
      data: {
        page: page,
        article_id: pageInfo.id
      },
      success: function(data){
        if (data.result === 0) {
          data = data.data;
          if (page == 1 && data.num == 0) {
            $('#js-feedback-list-wrap').html('<p class="feedback-none">暂无评论</p>')
          }
          else {
            displayList(data.data);
            initEvent();
            var $more = $('.js-feedback-more');
            if (data.pnum === data.data.length ) { //add more
              if (!$more.length && data.pnum < data.num) {
                $('#js-feedback-list-wrap').append('<div class="feedback-more"><span data-page="2" class="js-feedback-more">查看更多</span></div>');
              }else {
                $more.attr('data-page', +$more.attr('data-page') + 1);
              }
            }else {
              $('.js-feedback-more').remove();
            }
          }
        }
      },
      complete: function() {

      }
    });
  }

  function displayList(data) {
    var s = '',
        i = 0,
        len = data.length;
    for(; i < len; i++) {
      s += getHTML(data[i]);
    }
    display(s);

  }

  function display(html, prepend) {
    var $elem = $('#js-feedback-list');
    if (!$elem.length) {
      $('#js-feedback-list-wrap .feedback-loading,#js-feedback-list-wrap .feedback-none').remove();
      $elem = $('<div id="js-feedback-list"></div>').appendTo($('#js-feedback-list-wrap'));
    }
    $elem[prepend? 'prepend' : 'append'](html);
  }

  function getComment( rs ){
      //渲染主评论
      return [
          '<div class="comment clearfix">',
            '<div class="feed-author l">',
              '<a href="/u/', rs.uid, '/articles" >',
                '<img src="', rs.img, '" width="40" >',
              '</a>',
              '<a class="nick" href="/u/', rs.uid, '/articles" >', rs.nickname , '</a>',
            '</div>',
            '<div class="feed-list-content">',
              '<p>', rs.content, '</p>',
              '<div class="comment-footer">',
                '<span class="feed-list-time"> ',rs.create_time , '</span>',
                '<span class="reply-btn" data-commentid=', rs.id,' data-uid=',rs.uid,' data-username=',rs.nickname,
                  '>回复',
                '</span>',
              '</div>',
            '</div>',
          '</div>'// comment end
      ].join('');
  }
  function getReply( rs ){
      //判断是否回复自己
      function isSelf( from , to ,from_name , to_name ){
        if(from != to){
          return [
            '<a href="/u/',from ,'/articles" class="from-user">',from_name,'</a> 回复 ',
            '<a href="/u/',to,'/articles" class="to-user">',to_name,'</a>：'
          ].join('');
        }else{
          return ['<a href="/u/',from ,'/articles" class="from-user">',from_name,'</a>：'].join('');
        }
      }
      //渲染评论的回复
      return [
        '<div class="comment clearfix">',
          '<div class="feed-author l">',
            '<a href="/u/', rs.from_uid, '/articles" >',
              '<img src="', rs.img, '" width="40" >',
            '</a>',
          '</div>',
          '<div class="feed-list-content">',
            '<p>',
              isSelf( rs.from_uid , rs.to_uid , rs.from_username , rs.to_username ),
              rs.description,
            '</p>',
            '<div class="comment-footer">',
              '<span class="feed-list-time"> ',rs.create_time , '</span>',
              '<span class="reply-btn"',' data-commentid=',rs.reply_id,' data-uid=',rs.from_uid,' data-username=',rs.from_username,
                '>回复',
              '</span>',
            '</div>',
          '</div>',
        '</div>'// comment end
      ].join('');
  }
  function getAllReply( rs ){
    var chunk = '';
    if( rs && rs.length){
      for(var i = 0 ; i < rs.length ; i++){
        chunk += getReply( rs[i] );
      }
    }
    return chunk;
  }

  function renderReleaseReply( user ,comment_uid){
    //渲染发布回复的textarea
    return [
        '<div class="release-reply">',
          '<a href="/u/',user.uid ,'/articles" class="user-head">',
            '<img src="',user.img ,'" alt="',user.nickname,'"/>',
          '</a>',
          '<div class="replay-con">',
            '<div class="textarea-wrap">',
              '<textarea placeholder="写下你的评论..."></textarea>',
            '</div>',
            '<p class="errtip"></p>',
            '<div class="reply-ctrl clearfix">',
              '<div class="verify-code"></div>',
              '<div class="btn-wrap">',
                '<div class="cancel-btn">取消</div>',
                '<div data-comment-uid="',comment_uid ,'" class="release-reply-btn">提交</div>',
              '</div>',
            '</div>',
          '</div>',//replay-con end
        '</div>'//release-reply end
    ].join('');
  }

  function getMoreReply( num , reply_id){
    if( !num||num < 1 ){
      return '';
    }else{
      return [
        '<div class="getMoreReply" data-replyid=',reply_id,'>点击展开后面',
        '<span>', num , '</span>条回复',
        '</div>'
      ].join('');
    }

  }

  function getReplyBox( rs ,comment_num ,reply_id){
    var num = 0;
    if(comment_num){
      num = parseInt(comment_num)-3;
    }

    //渲染评论的回复的容器
    return [
        '<div class="reply-box">',
          getAllReply( rs ),
          getMoreReply( num , reply_id),
        '</div>'
    ].join('');
  }

  function getHTML(o) {
    return [
      '<div class="comment-box">',
        getComment( o , true ),
        getReplyBox(o.comment, o.comment_num , o.id),
        renderReleaseReply( user , o.uid),//user 声明在模板中
      '</div>'// comment-box end
    ].join('');
  }
  loadFeedback();

  //点击回复
  function initEvent(){
    //reply_id,description,from_uid,verify_code

    var replyinfo = {};
    replyinfo.reply_id = null;
    replyinfo.from_uid = null;
    //设置垂直居中
    function vMiddle( $elem ){
      var $winH = $(window).height();
      var $elemH = $elem.height();
      var offTop = $elem.offset().top;
      var topToWin = ($winH-$elemH)/2;
      //$(window).scrollTop( offTop - topToWin);
      $('html,body').animate({'scrollTop':( offTop - topToWin)+'px'},300,'swing');
    }

    //发布回复验证成功，失败状态
    $('.replay-con textarea')
        .on('succ',function(){
          $(this).parent().parent().find('p.errtip').text('');
        })
        .on('fail',function(e,msg){
          $(this).parent().parent().find('p.errtip').text(msg);
        });

    $('.comment-box').off().on('click',function(e){
      //显示回复框
      var $target = $(e.target);
      if($target.hasClass('reply-btn')){
        var toUser = $target.attr('data-username');
        $(this).find('.release-reply').fadeIn();
        $(this).find('textarea').focus().val('回复 '+toUser+'：');

        replyinfo.reply_id = $target.attr('data-commentid');
        replyinfo.from_uid = $target.attr('data-uid');
        $target.parents('.comment-box').siblings('.comment-box').find('.cancel-btn').click();
        vMiddle($(this).find('.release-reply'));
      }
    }).on('click',function( e ){
        if( $(e.target).hasClass('cancel-btn') ){
          //取消按钮
          var $root = $(this).find('.release-reply');
          $root.find('textarea').trigger('succ').val('');
          $root.find('.verify-code').trigger('succ').html('');
          $root.css('display','none');
        }
    }).on( 'click' , function( e ){
      //加载更多子评论
      var $target = $(e.target);
      if(!$target.hasClass('getMoreReply')){
        return ;
      }
      if($target.hasClass('disabled')){
        return ;
      }
      var $root = $(this).find('.reply-box');
      var replyId = $(e.target).attr('data-replyid');
      $target.addClass('disabled').html('请稍等...');
      var data = {};
      data.reply_id = replyId ;
      data.page = 2;//由于此次需求是点击加载后就全部显示，所以此值为常量，页面初始化加载为1
      $.ajax({
        url:"/article/getcomment",
        data:data,
        type:"post",
        dataType:"json",
        success:function(data){
          if( data.result ==0 ){
            var rs = data.data ;
            var chunk = '';
            for(var i = 0 ;i<rs.length;i++){
              chunk += getReply(rs[i]);
            }
            $target.remove();
            $root.append( chunk );
          }else{
            $target.remove();
            alert(data.msg);
          }

        },
        complete:function(){

        }
      });


    }).on('click',function(e){
      //发布回复
      var $target = $(e.target);
      if(!$target.hasClass('release-reply-btn')){
        return;
      }
      var $root = $(this).find('.replay-con');
      var replyBox = $(this).find('.reply-box');
      var $textarea = $root.find('textarea');
      var val = $textarea.val();
      val = $.trim(val);
      var reg = /^回复\s*\S+：/;
      if(reg.test(val)){
        val=val.replace(reg,"");
        //data.from_uid=tuid;
      }else{
        //如果没有要回复的目标，取主评论的uid
        replyinfo.from_uid= $.trim($target.attr('data-comment-uid'));
      }
      if(val.length < 3){
        $root.find('textarea').trigger('fail','评论内容不得少于3个字');
        return;
      }
      if(val.length>300){
        $root.find('textarea').trigger('fail','评论内容不得多于300');
        return;
      }
      $root.find('textarea').trigger('succ');


      var data = {};
      data.reply_id = replyinfo.reply_id;
      data.from_uid = replyinfo.from_uid;
      data.description = val;
      //判断是否需要验证码验证
      if($root.find('.verify-code-around').length!==0){
        var verifyVal = $.trim(verifyCode.getResult($root.find('.verify-code')));
        if(verifyVal.length==0){
          //dia.open('fail','请输入验证码',function(){});
          $root.find('.verify-code').trigger('fail','请输入验证码');
          return ;
        }else{
          data.verify_code = verifyVal;
        }
      }
      $target.addClass('disabled').html('提交...');
      $.ajax({
        url:"/article/savereplycomment",
        data:data,
        type:"post",
        dataType:"json",
        success:function(data){
          //console.log(data);

          if(data.result == 0){
            var rs = getReply(data.data);
            //console.log( rs );
            var len = replyBox.find('.comment').length;
            if( len < 3 ){
              replyBox.append( rs );
            }else{
              var hasReplyMore = replyBox.find('.getMoreReply').length>0?true:false;
              if( !hasReplyMore ){
                replyBox.append( rs );
              }
            }
            $root.find('.cancel-btn').click();
          }else if( data.result==-1&&data.data==1 ){
            //alert('需要验证码');
            verifyCode.renderVerifyCodeBlock($root.find('.verify-code'),'/article/getverifycode');
            return;
          }else if(data.result ==-103002) {
            $root.find('.verify-code').trigger('fail', '验证码错误');
          }else{
            $root.find('.verify-code').trigger('succ');
          }
        },
        complete:function(){
          $target.removeClass('disabled').html('提交');
        }
      });

    });


  }// initEvent end


  //主评论more
  $('#js-feedback-list-wrap').on('click', '.js-feedback-more', function() {
    loadFeedback($(this).attr('data-page') || 1);
  });

  //submit feedback;
  $('#js-submit').click(function() {
    var $this = $(this);
    var val;
    if ($this.hasClass('loading')) {
      return ;
    }

    val = $.trim($('#feedback-area').val())
    if (!val.length) {
      $('#feed-error').text('内容不能为空！');
      return ;
    }
    if (val.length > 300) {
      $('#feed-error').text('内容不能超过300个字！');
      return ;
    }
    $('#feed-error').text('');

    var param = {};
    param.article_id=pageInfo.id;
    param.content=val;

    if($(this).parent().find('.verify-code-around').length!==0){
      var verifyVal = $.trim(verifyCode.getResult('.verify-code'));
      if(verifyVal.length==0){
        $('.verify-code').trigger('fail','请输入验证码');
        return ;
      }else{
        param.verify = verifyVal;
      }
    }

    $this.addClass('loading').text('正在提交...');
    $('.verify-code').trigger('succ','请输入验证码');
    $.ajax({
      url: '/article/ajaxpostcomment',
      type: 'post',
      dataType: 'json',
      data: param,
      success: function(data) {
        if (data.result === 0) {
          data.data.user = {
            uid: OP_CONFIG.userInfo.uid,
            nickname: OP_CONFIG.userInfo.nickname,
            img: OP_CONFIG.userInfo.head
          };
          display(getComment(data.data), 1);
          $('#feedback-area').val('');
          $('#feed-error').html('<span style="color:#090;">发布成功</span>');
          $('.verify-code').html('');
          setTimeout(function() {
            $('#feed-error').text('');
          }, 2000);
          return ;
        }else if(data.data === 1 && data.result === -1){
          verifyCode.renderVerifyCodeBlock('.df-bottom .verify-code','/article/getarticlecommentcode');
        }else if(data.result==-103002){
          $('.verify-code').trigger('fail',data.msg);
          setTimeout(function() {
            verifyCode.renderVerifyCodeBlock('.df-bottom .verify-code','/article/getarticlecommentcode');
          }, 1000);
        }else{
          alert(data.msg);
          //dia.open('fail',data.msg,function(){});
        }
        //$('#feed-error').text(data.msg || '请稍后重试');
      },
      complete: function() {
        $this.removeClass('loading').text('提交');
      }
    });
  });

  //toggle praise
  $('#js-praise').click(function(e) {

    if (!OP_CONFIG.userInfo) {
      seajs.use("login_sns",function(login){
        login.init();
      });
      return ;
    }

    var $this = $(this),
      p = $this.hasClass('dc-praised');
    if ($this.hasClass('loading')) return ;

    $this.addClass('loading');

    $.ajax({
      url: p ? '/article/ajaxdelupvote' : '/article/ajaxupvote',
      type: 'post',
      dataType: 'json',
      data: {
        article_id: pageInfo.id
      },
      success: function(data) {
        if (data.result === 0) {
          $this[p ? 'removeClass' : 'addClass']('dc-praised');
          $this.find('i').removeClass(p ? 'sns-thumb-up' : 'sns-thumb-up-outline')
          .addClass(!p ? 'sns-thumb-up' : 'sns-thumb-up-outline');
          $this.find('span').text(p ? '点赞' : '已赞');
        }
      },
      complete: function() {
        $this.removeClass('loading');
      }
    });
  });
  //toggle follow
  $('#js-follow').click(function(e) {

    if (!OP_CONFIG.userInfo) {
      seajs.use("login_sns",function(login){
        login.init();
      });
      return ;
    }

    var $this = $(this),
      p = $this.hasClass('dc-followed');
    if ($this.hasClass('loading')) return ;

    $this.addClass('loading');

    $.ajax({
      url: p ? '/article/ajaxdelcollect' : '/article/ajaxcollect',
      type: 'post',
      dataType: 'json',
      data: {
        article_id: pageInfo.id
      },
      success: function(data) {
        if (data.result === 0) {
          $this[p ? 'removeClass' : 'addClass']('dc-followed');
          $this.find('i').removeClass(p ? 'sns-favorite' : 'sns-favorite-outline')
          .addClass(!p ? 'sns-favorite' : 'sns-favorite-outline');
          $this.find('span').text(p ? '收藏' : '已收藏');
        }
      },
      complete: function() {
        $this.removeClass('loading');
      }
    });
  });
  //share
  var articlename = $(".detail-title").text(),
      imgPic = $("#js-share-img").attr("data-pic"),
      title = '我刚刚在@慕课网 读了篇好文章：'+articlename+'_慕课网_文章',
      link='http://www.mukewang.com'+window.location.pathname;
  imgPic?imgPic='http://img.mukewang.com/'+imgPic+'.jpg':'';

  window._bd_share_config={
    "common":{
      "bdUrl":link,
      "bdSnsKey":{'tsina':'2788596354'},
      "bdText":title,
      "bdMini":"2",
      "bdMiniList":false,
      "bdPic":imgPic,
      "bdStyle":"0",
      "bdSize":"16",
      "searchPic":""
    },
    "share":{}
  };
  with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];


  //页面加载5秒后分享提示消失
    shareFrame=$(".js-share-statue");
    setTimeout(function(){shareFrame.hide();},5000);

    //分享点击返回积分事件
    var shareEles = $(".bdsharebuttonbox a");
    var sendId= pageInfo.id;
    var ajaxing = 0;
    var timer,interval=5000;

    shareEles.on("click",function(e){
        if(ajaxing) return;
        ajaxing=1;
        shareFrame.hide();
        $.ajax({
            type: "post",
            url: '/course/courseshare',
            data: "id="+sendId+"&type="+5,
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
    }).mouseenter(function(){
        shareFrame.show();
    }).mouseleave(function(){
        if(timer) clearTimeout(timer);
        timer=setTimeout(function(){
            shareFrame.hide();
        },interval);

    });


  //click other place weichat remove
  $(document).mouseup(function(e) {
      var _con=$("#bdshare_weixin_qrcode_dialog");
      if(!_con.is(e.target)&&_con.has(e.target).length==0){
          _con.hide().remove();
          $("#bdshare_weixin_qrcode_dialog_bg").attr("display","none").remove();
      }
  });

  //no login comment
  $('#js-text-login').click(function() {
    if (!OP_CONFIG.userInfo) {
      seajs.use("login_sns",function(login){
        login.init();
      });
      return ;
    }
  });
});
