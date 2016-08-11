define(function(require, exports, module){
require('/static/page/course/common/autocomplete.js');
var verifyCode = require('../common/verify-code.js');
var store = require('store');

var util = {
    error: function(selector,msg) {
        if(arguments.length < 2) {
            msg = selector;
            selector= $(this).next('.errortip');
        }
        if (msg) {
            //$(selector).html('<i class="icon-point"></i> ' + msg);
            $(selector).html(msg);
        }
        else {
            $(selector).empty();
        }
    }
};

var $title=$("#ques-title");
window.UEDITOR_HOME_URL="/static/lib/ueditor/";
var editor=UE.getEditor("ques-editor",{
	imagePopup:true,
	initialFrameHeight:280
	//scaleEnabled:true
	/*enableAutoSave: true,
      saveInterval: 2e3*/
})
editor.on('ready', function(){
	var editor = this;
	setTimeout(function() {
		editor.execCommand('drafts')
		$title.focus();
	});
})

editor.addListener("focus", function () {
    $("#ques-editor .edui-editor-iframeholder").removeClass('tag')
});
editor.addListener("blur", function () {
    if(editor.getContent()==""){
    	$("#ques-editor .edui-editor-iframeholder").addClass('tag')
    }
});
	verifyCode.renderVerifyCodeBlock('.verify-code','/wenda/getsavecode');
if($title[0].placeholder===undefined){
	$title.focus(function(){
		var $this=$(this);
		if($this.val()===$this.attr("placeholder")){
			$this.val("").removeClass("placeholder");
		}
	})
	.blur(function(){
		var $this=$(this);
		if(!$this.val().length){
			$this.val($this.attr("placeholder")).addClass("placeholder");
		}
    });
}
var titleTxt=store.get('titleVal');
(titleTxt=="No")?$title.val(""):$title.val(titleTxt);
$title.on("blur",function(){
	store.set('titleVal',$title.val());
})
var gerror=(function(){
	var $p=$(".js-global-error");
	return {
		hide:function(){
			$p.hide();
		},
		show:function(t){
			$p.text(t).show();
		}
	}
})();


$title.blur(checkTitle)
/*.focus(function(){
	//$(this).removeClass("error").next("p").hide();
	//gerror.hide();
		//gerror.text('');
})*/;

var $label_ids=$("#tagcontent");
/*UE.getEditor("ques-editor").addListener("focus", function() {
    util.error('#editor-wrap .errortip','');
    //gerror.hide();
});*/

var popEle=$(".pop-tips-layer");
var popLeave=function(){
	var w=-(parseInt(popEle.width())+2)/2+'px',
		h=-(parseInt(popEle.height())+2)/2+'px';
	popEle.css({
		"marginLeft":w,
		"marginTop":h
	})
	setTimeout(function() {
		popEle.hide();
	}, 2000);
}

var subQues=function(){
	var editor,
		$this=$('#ques-submit-btn'),
		//contentLength,
		content,
		data,
        noCredit = $("#no-credit"),//积分不足
        hadCredit = $("#enough-credit"),//积分充足
        usedown = $("#interal-use");//积分确定使用

	if($this.hasClass("ques-loading")){
		return ;
	}

	data = {};
	if (checkTitle.call($title) === false) {
		return ;
	}
	editor = UE.getEditor("ques-editor");
	/*if ((contentLength = $.trim(editor.getContentTxt()).length) < 5) {
        util.error('#editor-wrap .errortip','不能少于5个字符！');
		return ;
	}*/

	content = editor.getContent();
	if (content.length > 20000) {
        util.error('#editor-wrap .errortip','超过字数上限，最多输入20000字');
		return ;
	}
	if($("#js-tags .onactive").length == 0){
		//$("#tagcontent").addClass("error");//.next("p").text("请选择以下标签！");
        util.error('#js-tags ~ .errortip','问题至少选择1个分类');
		return;
	}else{
        util.error('#js-tags ~ .errortip','');
	}

	//有积分再发 验证码为1
	if($(".interal-checked").length){
        data.checkcount = 1;
        data.verify = 1;

    }else{
		//判断是否需要验证码验证
		if($this.parent().prev('.verify-box').find('.js-verify-refresh').length!==0){
			var verifyVal = $.trim(verifyCode.getResult('.verify-code'));
			if(verifyVal.length==0){
				$('.verify-code').trigger('fail',"请输入验证码");
				return ;
			}else{
				data.verify = verifyVal;
			}
		}
	}

	var arr = [];
	$('#js-tags .onactive').each(function(index,obj){
		arr.push($(obj).attr("data-id"));
	});
	//data.cat_id = $(".js-ques-category .onactive").attr("data-type") || 1;//temp use 1
	data.title = $title.val();
	data.content=content;
	data.label_ids=arr.join(",");
	//editor.sync();
	$this.addClass("ques-loading").text("发布中...");

	$('.verify-code').trigger('succ');
	$.ajax({
		url:"/wenda/saveques",
		type:"post",
		dataType:"json",
		data:data,
		success:function(data){
			//console.log(data);
			if(data.result===0){
                usedown.removeClass("interal-checked");

        		editor.execCommand('clearlocaldata');
				store.set('titleVal','');
				window.location.href="/wenda/savesuccess/id/"+data.data.id;
				return ;
			} else if(data.result==-103002){
				$('.verify-code').trigger('fail','');
				$(popEle).html('<i class="icon-point-revert"></i> 验证码错误，请重试').show();
            	popLeave();
				setTimeout(function() {
            		verifyCode.renderVerifyCodeBlock('.verify-code','/wenda/getsavecode');
          		}, 1000);
			} else if(data.result == -105001) {
                //积分不足
                noCredit.show();
                noCredit.find(".cancel-cf").on('click',function(){
                    noCredit.hide();
                })

            } else if (data.result == 105002){
                //积分充足
                hadCredit.show();
                $("#interal-cancel").on('click',function(){
                    hadCredit.hide();
                })
                usedown.on('click',function(){

                    $(this).addClass('interal-checked');
                    hadCredit.hide();

                    $("#ques-submit-btn").trigger('click');
                })

            } else if(data.result == -5){//-5  违法词
            	$(popEle).html('<i class="icon-point-revert"></i> 问题或补充中有违禁词，请修改后重试').show();
            	popLeave();
            } else{//-1  失败
            	$(popEle).html('<i class="icon-point-revert"></i> 问题发布失败').show();
            	popLeave();
				//dia.open('fail',data.msg,function(){});
			}
		},
		error:function(){
			//gerror.show("服务器错误，请稍后重试！");
        	$(popEle).html('<i class="icon-point"></i> 服务器错误，请稍后重试！').show();
        	popLeave();
		},
		complete:function(){
			$this.removeClass("ques-loading").text("发布(Ctrl+Enter)");
		}
	})
}
//submit
$('#ques-submit-btn').click(subQues);
$(document).on('submit.imooc',function(e){
    subQues();
})

function getRealLen( str ) {  
    return str.replace(/[^\x00-\xff]/g, '__').length; 
}  


function checkTitle() {
	var $this = $(this),
        val;
	if (getRealLen((val=$.trim($this.val()))) < 10) {
		$this.addClass("ipt-error");
        util.error.call(this,'标题不能少于5个汉字！');
		return false;
	}
	else if (getRealLen(val) > 100) {
        $this.addClass("ipt-error");
        util.error.call(this,'标题不能大于50个汉字！');
		return false;
	}
	else {
		$this.removeClass("ipt-error");
        util.error.call(this,'');
	}
}

//verify code
//$(document).on("click",".verify-code-around",function(){
//    var $img=$(this).prev("img");
//    $img.attr("src",$img.attr("src").replace(/\?\S/,"?"+Math.random()));
//});

$(".js-ques-category a").click(function(e){
	e.preventDefault();
	var $this;
	if(($this=$(this)).hasClass(".onactive")) return ;
	$this.siblings(".onactive").removeClass("onactive").end().addClass("onactive");
});
/*标签*/
$("#js-tags").on('click', '.save-list-tag', function() {
	var $this = $(this),
        id = $this.attr('data-id');
    if (!$this.hasClass("onactive")) {
        if ($("#js-tags .onactive").length > 2) {
            return;
        }else{
        	$this.addClass("onactive");
        }
    } else {
        $this.removeClass("onactive");
    }
});
/*$("#js-tags").on('click', '.list-tag', function() {
	var $this = $(this),
        id = $this.attr('data-id'),
        $tagcontainer;
    //$("#label-default").hide();
    //util.error('#tagcontent ~ .errortip','');
    if (!$this.hasClass("onactive")) {
        if ($("#js-tags .onactive").lenth > 2) {
            return;
        }
        //$(this.cloneNode(true)).append('<i class="icon-close"></i>').appendTo('#tagcontent');
        //$("#tagcontent").append($("<li class='associated-labe' data-id='" + dataid + "'>" + tagcontent + "<em class='tag-close'></em></li>"));
    } else {
        $tagcontainer = $('#tagcontent');
        $tagcontainer.find("[data-id='" + id + "']").remove();
        !$tagcontainer.find('.list-tag').length && $("#label-default").show();
    }
    $this.toggleClass("onactive");
});*/

$("#tagcontent").on('click','.list-tag',function() {
    var $this = $(this),
        id = $this.attr('data-id');
    $this.remove();
    $('#js-tags [data-id="' + id + '"]').removeClass('onactive');
    if ($("#tagcontent .list-tag").length === 0) {
        $("#label-default").show();
    }
});
	//快捷键方式提交
  
});

