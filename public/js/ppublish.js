define(function(require) {
  require('util/modal.button.js');
  require('lib/webupload/webuploader.withoutimage.min.js');
  require('lib/webupload/webuploader.css');
  require('lib/pagedown/Markdown.Editor.js');
  require('lib/pagedown/editor.css');
  require('lib/pretty/prettify.js');
  require('lib/pretty/prettify.css');
  var store = require('store');


  //标签选择
  var tagSelector = (function(){
    var arr = [],returnObj = {};
    var target = $('.tag-selector .target-box');
    var tagBox = $('.tag-selector .tag-box');
    //初始化管理数组
    var targetTags = target.find('span')
    if(targetTags.length!=0){
      $.each( targetTags , function( i , n ){
        var obj ={};
        obj.tagId = $(n).attr('tag-id');
        obj.text = $(n).text();
        arr.push( obj );
      })
    }

    function addTag( obj ){
      if( arr.length >= 3){
        return false;
      }
      arr.push(obj);
      var tag = [
          '<span tag-id="', obj.tagId ,'">',obj.text,
            '<i class="icon-close"></i>' ,
          '</span>'
      ];
      target.append(tag.join(''));
      return true;
    }
    function delTag( obj ){
      var tagId = obj.tagId;
      $.each( arr , function( i , n ){
        if(n.tagId == tagId ){
          var temp = arr.splice(i,1);
          target.find('[tag-id='+temp[0].tagId+']').remove();
          return false;
        }
      });
      tagBox.find('[tag-id='+tagId+']').removeClass('on');
    }

    target.on( 'click' , 'i' ,function(){
      var obj = {};
      var $tag = $(this).parent();
      obj.tagId = $tag.attr('tag-id');
      obj.text = $tag.text();
      //$tag.remove();
      delTag( obj );
    });

    tagBox.on('click' , 'span' ,function(){
      var obj = {};
      obj.tagId = $(this).attr('tag-id');
      obj.text = $(this).text();
      if($(this).hasClass('on')){
        delTag( obj );
        return;
      }
      if(addTag(obj)){
        $(this).addClass( 'on' );
      }
    });
    returnObj.getResult = function(){
      var temp = [];
      $.each( arr , function(i,n){
        temp.push( n.tagId );
      })
      return temp.join(',');
    }
    return returnObj;

  })();

  //editor
  function randerEditor(id, options) {
    var tpl = [
      '<div id="js-wmd-wrap-{id}" class="wmd-wrap">',
        '<div id="wmd-button-bar-{id}" class="wmd-button-bar-{id} wmd-button-bar">',
          '<ul id="wmd-button-bar-right-{id}" class="r wmd-button-bar-right">',
            '<li class="wmd-button wmd-button-edit wmd-button-disabled r" title="编辑"><span></span></li>',
            '<li class="wmd-button wmd-button-preview r" title="预览"><span></span></li>',
            '<li class="wmd-button wmd-button-fullscreen r" title="全屏"><span></span></li>',
          '</ul>',
        '</div>',
        '<div id="js-wmd-input-wrap-{id}" class="wmd-input-wrap"><textarea id="wmd-input-{id}"></textarea></div>',
        '<div id="js-wmd-preview-wrap-{id}" class="wmd-preview-wrap">',
          '<div id="wmd-preview-{id}" class="wmd-preview"></div>',
        '</div>',
      '</div>'
    ].join('').replace(/\{id\}/g, id);

    var util, originVal;

    originVal = $('#' + id).find('textarea').val();
    $('#' + id).html(tpl);
    $('#' + id).find('textarea').val(originVal);
    $('#' + id).on('mouseenter', '.wmd-button-bar-right .wmd-button', function() {
      if (!$(this).hasClass('wmd-button-disabled')) {
        $(this).addClass('wmd-button-hover');
      }
    }).on('mouseleave', '.wmd-button-bar-right .wmd-button', function() {
      $(this).removeClass('wmd-button-hover');
    }).on('click', '.wmd-button-preview', function(){
      util.preview();
    }).on('click', '.wmd-button-edit', function() {
      util.edit();
    }).on('click', '.wmd-button-fullscreen', function() {
      var $this = $(this);
      util.edit(1);
      if ($this.hasClass('wmd-button-smallscreen')) {//to small edit
        $('#js-wmd-wrap-' + id).removeClass('wmd-wrap-model-full');
        $this.removeClass('wmd-button-smallscreen');
        $('body').css({overflow:'auto'});
      }
      else{
        $('#js-wmd-wrap-' + id).addClass('wmd-wrap-model-full');
        $this.addClass('wmd-button-smallscreen');
        $('body').css({overflow:'hidden'});
        util.disable('preview');
      }
    });

    util = function() {
      var wraper = $('#js-wmd-wrap-' + id),
          rightBar = $('#wmd-button-bar-right-' + id),
          disableClass = 'wmd-button-disabled';

      return {
        enable: function(key) {
          util.getEl(key).removeClass(disableClass);
        },
        disable: function(key) {
          util.getEl(key).addClass(disableClass);
        },
        isDisabled: function(key) {
          return util.getEl(key).hasClass(disableClass);
        },
        getEl: function(key) {
          var $el;
          if (typeof key === 'string') {
            $el = rightBar.find('.wmd-button-' + key);
          }
          else {
            $el = $(key);
          }
          return $el;
        },
        preview: function() {
          if (util.isDisabled('preview')) return ;
          util.disable('preview');
          util.enable('edit');
          $('#wmd-button-row-'+ id).hide();
          wraper.addClass('wmd-wrap-model-preview');
        },
        edit: function(force) {
          if (!force && util.isDisabled('edit')) return ;
          util.enable('preview');
          util.disable('edit');
          $('#wmd-button-row-'+ id).show();
          wraper.removeClass('wmd-wrap-model-preview');
        }
      }
    }();

    var converter = Markdown.getSanitizingConverter();
    Markdown.Extra.init(converter, {
      extensions: "all",
      highlighter: "prettify"
    });

    var editor = new Markdown.Editor(converter, '-' + id);
    //image dialog
    editor.hooks.set('insertImageDialog', function(doLink) {
      var callback = null;
      $('#js-amu-upload-btn').on('click', function() {
        uploader.upload();
      });
      $('#js-modal-mk-image')
      .on('shown.bs.modal', function(){
        //console.log('modal show');
        initUpload();
      })
      .on('hide.bs.modal', function() {
        reset(1);
      });

      var uploader;
      function initUpload() {
        var $this = $(this);
        uploader = WebUploader.create({
            swf: 'http://static.mukewang.com/static/lib/webupload/Uploader.swf',
            server: '/article/ajaxuploadimg',
            pick: {id: '#js-amu-btn',multiple: false},//'#upload-picker',
            resize: false,
            fileVal:'photo',
            fileNumLimit: 1,
            fileSize: 2 * 1024 * 1024,//2M
            accept: {
              extensions: 'jpg,jpeg,gif,png,bmp'
            }
        });
        uploader.on('beforeFileQueued', function(file){
          //webupload 在只传一个文件的情况下，不能重选
          //手动清空队列，进行重选
          //目录版本里可以用uploader.reset 重置queue
          var files = uploader.getFiles(),
            len = files.length;
          while (len--) {
            uploader.removeFile(files[len], true);
          }
          $('#js-amu-ipt').val(file.name);
        })
        uploader.on('fileQueued', function(file) {
          err('');
        });
        uploader.on('error', function(msg) {
          var m = {
            'Q_EXCEED_NUM_LIMIT': '一次只能上传一张图片',
            'Q_EXCEED_SIZE_LIMIT': '图片不能超过2M',
            'Q_TYPE_DENIED': '图片类型不支持'
          }
          //console.log(msg)
          err(m[msg] || '文件格式不支持！');
        });
        uploader.on('uploadAccept', function(a,b){
          $('#upload-progress').remove();
          if (b.result !== 0) {
            err(b.msg || '上传错误，稍后重试~');
          }
          else {
            //err('上传成功！');
            callback && callback(b.data.imgpath);
            $('#js-modal-mk-image').modal('hide');
          }
        });
        uploader.on('uploadStart', function() {
          err('正在上传...');
        });

        uploader.on('uploadError', function() {
          err('上传错误，请稍后重试');
          //uploader.stop();
          //uploader.reset();
        });
        uploader.on('uploadComplete', function() {
          //err('');
          reset();
        });
        function err(msg) {
          $('#js-amu-msg').text(msg);
        }
        initUpload = $.noop;
      }

      //reset

      function reset(all) {
        uploader.stop();
        uploader.reset();
        $('#js-amu-ipt').val('请选择图片');
        all && $('#js-amu-msg').text('');
      }

      return function(doLink){
        $('#js-modal-mk-image').modal('show');
        callback = doLink;
        return 1;
      }
    }());

    editor.hooks.addNoop('insertLinkDialog');
    //link dialog
    editor.hooks.set('insertLinkDialog', function(doLink) {
      var callback;
      $('#js-modal-mk-link')
      .on('shown.bs.modal', function(){
        var $ipt = $('#js-aml-ipt');
        $ipt.val($ipt.attr('placeholder'));
        //$ipt[0].select();
        setTimeout(function(){$ipt.focus().select();},1);
      });

      $('#js-aml-btn').click(function() {
        var link = 'http://',
          $ipt = $('#js-aml-ipt');
        if ($ipt.val() !== $ipt.attr('placeholder')) {
          link = $ipt.val();
        }
        callback(link);
        $('#js-modal-mk-link').modal('hide');
      });

      return function(doLink) {
        callback = doLink;
        $('#js-modal-mk-link').modal('show');
        return 1;
      }
    }());


    editor.hooks.chain("onPreviewRefresh", prettyPrint); // google code prettify
    editor.run();
  }
  randerEditor('js-mk');

  //face upload;
  !function() {
    var uploader;
    uploader = WebUploader.create({
        swf: '/static/lib/webupload/Uploader.swf',
        server: '/article/ajaxuploadimg',
        pick: {id: '#js-face-upload',multiple: false},//'#upload-picker',
        resize: false,
        fileVal:'photo',
        fileNumLimit: 1,
        fileSize: 2 * 1024 * 1024,//2M
        auto: true,
        sendAsBinary: false,
        accept: {
          extensions: 'jpg,jpeg,gif,png,bmp'
        }
    });
    uploader.on('beforeFileQueued', function(file){
      //webupload 在只传一个文件的情况下，不能重选
      //手动清空队列，进行重选
      //目录版本里可以用uploader.reset 重置queue
      var files = uploader.getFiles(),
        len = files.length;
      while (len--) {
        uploader.removeFile(files[len], true);
      }
    })
    uploader.on('fileQueued', function(file) {
      err('');
    });
    uploader.on('error', function(msg) {
      var m = {
        'Q_EXCEED_NUM_LIMIT': '一次只能上传一张图片',
        'Q_EXCEED_SIZE_LIMIT': '图片不能超过2M',
        'Q_TYPE_DENIED': '图片类型不支持'
      }
      //console.log(msg)
      err(m[msg] || '文件格式不支持！');
    });
    uploader.on('uploadAccept', function(a,b){
      $('#upload-progress').remove();
      if (b.result !== 0) {
        err(b.msg || '上传错误，稍后重试~');
      }
      else {
        $('#js-face-reault').html('<div class="face-result-inner"><img src="' + b.data.imgpath + '" width="120"><span class="rm-face-reault">删除</span></div>');
        $('#art-face').val(b.data.key);
      }
    });
    uploader.on('uploadStart', function() {
      err('正在上传...');
    });

    uploader.on('uploadError', function() {
      err('上传错误，请稍后重试');
      //uploader.stop();
      //uploader.reset();
    });
    uploader.on('uploadComplete', function() {
      //err('');
      uploader.reset();
    });
    function err(msg) {
      $('#js-face-reault').text(msg);
    }

    $('#js-face-reault').on('click', '.rm-face-reault', function() {
      $('#js-face-reault').empty();
      $('#art-face').val('');
      uploader.reset();
    });
  }();

  //submit
  var bLength= function(str){
    if (!str) {
      return 0;
    }
    var aMatch = str.match(/[^\x00-\xff]/g);
    return (str.length + (!aMatch ? 0 : aMatch.length));
  };

  var validate = {
    title: function(force) {
      var $ipt = $('#art-title'),
          val;
      if (force || $ipt.attr('data-valided')) {
        $ipt.attr('data-valided', 1);
        val = $.trim($ipt.val());
        var leng=bLength(val)
        if (leng > 60) {
          validate.msg($ipt, '标题不能超过30个汉字！');
          return false;
        }
        if (leng < 6) {
          validate.msg($ipt, '标题不能少于3个汉字！');
          return false;
        }
        validate.msg($ipt);
        return val;
      }
    },
    cat: function(force) {
      var $ipt = $('#art-cat'),
        val = $ipt.val();
        if (!val) {
          validate.msg($ipt, '请选择栏目！');
          return false;
        }
        validate.msg($ipt);
        return val;
    },
    msg: function(el, msg) {
      var $el = $(el);
      $el[msg ? 'addClass' : 'removeClass']('ipt-error');
      $el.siblings('.form-ipt-error').html(msg || '');
    }
  }


  var popLayer=function(success,text){
      var c=""
      if(success==0){
        c=" pop-error"
      }
      var coverlay='<div class="contain-coverLayer"></div>';
      var popsucc='<div id="js-pop-del" class="pop-deleting"><div class="deleting-bd'+c+'"></div><div class="deleting-btm">'+text+'</div></div>';
      $("body").append(popsucc).append(coverlay);
      setTimeout(function(){
          $("#js-pop-del").remove();
          $(".contain-coverLayer").remove();
      },1500);

  }

  var formSubmit=function() {
    var $this = $('#js-submit'),
      tmp,
      data;

    if ($this.hasClass('loading')) return ;

    data = {};
    if( old_label ){
      data.old_label_ids = old_label;
    }
    data.label_ids = tagSelector.getResult();
    data.title = validate.title(1);
    if (!data.title) return ;

    data.pic = $('#art-face').val();

    data.column_id = validate.cat();
    if (!data.column_id) return ;

    data.content = $('#js-mk textarea').val();
    if (data.content.length < 50) {
      $('#js-mk').siblings('.form-ipt-error').text('内容不能少于50个字！');
      return ;
    }
    $('#js-mk').siblings('.form-ipt-error').text('');
    var url = '/article/ajaxpublish';
    if (OP_CONFIG.preid) {
      url = '/article/ajaxedit';
      data.id = OP_CONFIG.preid;
    }

    $this.addClass('loading').text('正在提交...');

    $.ajax({
      url: url,
      type: 'post',
      data: data,
      dataType: 'json',
      success: function(data) {
        if (data.result === 0) {
          //$('#js-msg').html('<span style="color:#090;">' + (OP_CONFIG.preid?'修改':'发布') + '成功</span>');
          if($(".js-submit-tip").length>0){
            popLayer(1,"成功提交审核")
          }else{
            popLayer(1,"文章发布成功")
          }
          store.set('title','');
          store.set('content','');
          
          setTimeout(function() {
            window.location.replace('/article/' + data.data);
          }, 1500);
        }
        else{
          popLayer(0,data.msg)

        }
      },
      error: function() {
        popLayer(0,'发布失败')
          // $('#js-msg').html('发布失败');
          // setTimeout(function() {
          //   $('#js-msg').empty();
          // },3e3);
      },
      complete: function() {
        $this.removeClass('loading').text('提交(Ctrl+Enter)');
      }
    });
  }

  $('#art-title').on({
    blur: function() {
      validate.title(1);
    },
    keyup: function() {
      validate.title();
    }
  });
  $('#art-cat').change(function() {
    validate.cat();
  });
  //submit
  $('#js-submit').click(formSubmit);
  //每隔20秒自动保存
  if(!(/edit/.test(window.location.href))){
    (function(){
      var timer = null;

      $('#art-title').val( store.get('title') );
      $('#js-mk textarea').val( store.get('content') );
      function showTip(){
        $('.form-ipt-wrap.edit-area .tip').fadeIn(200,function(){
          timer = window.setTimeout(function(){
            $('.form-ipt-wrap.edit-area .tip').hide();
          },3*1000);
        });
      }
      $('.form-ipt-wrap.edit-area .tip i').on('click',function(){
        $('.form-ipt-wrap.edit-area .tip').hide(0);
        window.clearTimeout(timer);
      })
      function save(){
        window.setTimeout(function(){
          var title = $.trim( $('#art-title').val() );
          var content = $.trim( $('#js-mk textarea').val() );
          //store.set('title',title );
          //store.set('content',content);
          if(title == store.get('title')&&content == store.get('content')){
            //console.log('文件一样，不重新保存');
          }else{
            store.set('title',title);
            store.set('content',content);
            //console.log('wenjia');
            showTip();
          }
          save();
        },5*1000);
      }
      save();
    })();
  }
  //快捷键方式提交
  $(document).on('submit.imooc',function(e){
    formSubmit();
  })

});