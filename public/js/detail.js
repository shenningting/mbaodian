define(function(require, exports, module){
	require('common');
	//require('/static/lib/layer/1.6.0/layer.min.js');
	require("/static/lib/ueditor/ueditor.parse.js");
	require("/static/page/wenda/index.js");
	require('/static/lib/layer/1.6.0/layer.min.js');
	require('/static/lib/layer/1.6.0/skin/layer.css');
 	var	cutil=require("/static/page/wenda/detail-common");
 	var isAjax=false;

 	/*layer.calert=function(alertMsg,callback){	//普通对话框，类似系统默认的alert()
		return $.layer({
			dialog : {msg : alertMsg, type : 9,yes:function(){callback&&callback();}},
			title : "成功 ",
			area: ['auto', 'auto'],
			close:function(index){
				layer.close(index);
				callback&&callback();
			}
		});
	}*/
	//shCore codehightlight inner get
	uParse("body",{
        rootPath : '/static/component/base/ueditor/',
        chartContainerHeight:500
    });
	var util={
		msg:function(msg,isRight){
            var $ctx=$(this).closest(".js-msg-context"),
                m=msg?"addClass":"removeClass",
                c=isRight?"qa-tips-ok":"qa-tips-error";
            $ctx.find(".qa-tips").removeClass("qa-tips-ok qa-tips-error")[m](c).html(msg||"");
        },
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
	}

	var opts={
		initialFrameHeight:100
		//initialFrameWidth:766
	}
	var cueditor=UE.getEditor("js-reply-editor-box",opts);

	if(!OP_CONFIG.userInfo){
		cueditor.addListener("ready",function(){
			cueditor.setDisabled('fullscreen');
		});
		$("#answer-frame").click(function(){
			seajs.use("login_sns",function(login){
				login.init();
				return;
			});
		})
	}else{
		$("#answer-frame").click(function(){
			$("#avator-wrap,#js-reply-wrap").removeClass("answer-hidden");
			$("#add-answer").hide();
			setTimeout(function(){
				cueditor.focus();
			},100)
		})
	}
	
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


	cueditor.addListener("focus",function(){
		util.msg.call($("#js-reply-editor-box"));
	});

	$(".js-solved").on('click',function(){
		if($(this).hasClass('had-solve')) return;
		if(isAjax) return;
		isAjax=true;

		var $that=$(this),
			data={},
			quesid=$that.data("quesid"),
			replyid=$that.data("replyid");

		data.ques_id=quesid;
		data.reply_id=replyid;
		$.ajax({
			url:"/wenda/adoptreply",
			type:"post",
			dataType:"json",
			data:data,
			success:function(data){
				if(data.result==0){
					$that.removeClass("js-solved").addClass("had-solve").text("已被提问者采纳");
					setTimeout(function(){location.reload()},1000);
				}else if(data.result==-6){
					$(popEle).html('<i class="icon-point-revert"></i> 该问题已有答案被采纳').show();
	        		popLeave();
					return;
	        		
				} else{
					return;
				}
			},
			complete:function(){
				isAjax=false;
			}
		})
	})
	
	$('#js-qa-wenda a').attr('target','_blank');
	$('.qa-comment-c a').attr('target','_blank');

	$("#js-wenda-ci-submit").click(function(e){
		e.preventDefault();
		var $this=$(this),
			$foot,
			$vbox,
			data,
			v,
			content;

		if ($this.hasClass("disabled")) return ;
		content=UE.getEditor("js-reply-editor-box").getContent();
		data={};
		if($.trim(UE.getEditor("js-reply-editor-box").getContentTxt()).length<3){
			util.msg.call($this,"回答字数不少于3个！");
			return ;
		}
		if(content.length>20000){
			util.msg.call($this,"回答字数不大于20000个！");
			return ;
		}

		$foot=$("#js-qa-ci-footer");
		if(($vbox=$foot.find(".verify-code")).length){
            v=$vbox.find("input").val();
            if(v.length==0){
                util.msg.call(this,"请输入验证码");
                return ;
            }
            /*if(v.length!=4){
                util.msg.call(this,"请输入正确的验证码");
                return ;
            }*/
            data.verify_code=v;
		}
		data.content=content;
		data.ques_id=$this.attr("data-qid");
		util.msg.call(this);
		$this.addClass("disabled").text("回答...");
		$.ajax({
			url:"/wenda/savereply",
			type:"post",
			dataType:"json",
			data:data,
			success:function(data){
				if(data.result==0){
					$(popEle).html('<i class="icon-tick2"></i> 回答成功').show();
            		popLeave();
					setTimeout(function(){
						location.href=data.data;
					},1000);

				}
				else if(data.data === 1 && data.result === -1){
					if($foot.find(".verify-code").length) return ;
                    $foot.prepend(cutil.getVerifyCodeBlock());
					$(popEle).html('<i class="icon-point-revert"></i> 请输入验证码').show();
            		popLeave();
                    //util.msg.call($this,"请输入验证码");
                    return
				}
				else{
					$(popEle).html('<i class="icon-point-revert"></i>'+ data.msg).show();
            		popLeave();
					//util.msg.call($this,data.msg);
                    $foot.find(".verify-code-around").trigger('click');
				}
			},
			complete:function(){
				$this.removeClass("disabled").text("回答");
			}
		})
	});

	//reedit

	//type 1问题， 2 回答， 3 回复
	$(document).on("click",".js-del",function(event) {
		
		var id=$(this).data("id")
		var type=$(this).data("type")
		var arr=["","提问","回答","回复"]
		if(confirm("确认删除此"+arr[type]+"?")){
			$.ajax({
				url:"/wenda/wddelete",
				data:{
					id:id,
					type:type
				},
				dataType:"json",
				type:"GET",
				success:function(data){
					if(data.result==0){
						$(popEle).html('<i class="icon-tick2"></i> 删除成功！').show();
	            		popLeave();
						setTimeout(function(){location.reload()},1000);
					}else{
						alert("删除失败!")
					}
				}
			});			
		}


	});
	var isEditorReady;

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

	$("#js-wenda-editor-title").blur(checkTitle)

	$("#js-edit").click(function(){
		var $ctn=$("#js-content-main"),
			editor;
		if($("#js-wenda-editor").is(":visible")) return ;
		$ctn.hide();
		$("#js-wenda-editor-title").val($ctn.find(".js-qa-wenda-title").text());
		//$("#js-editor-content-dup").val()
		if(!isEditorReady){
			isEditorReady=1;
			editor=UE.getEditor("js-wenda-editor-content");
			editor.addListener("ready",function(){
				isEditorReady=2;
				UE.getEditor("js-wenda-editor-content").setContent($("#js-editor-content-dup").html())
			})
			editor.addListener("focus",function(){
				util.msg.call($("#js-wenda-editor"));
			});
		}

		if(isEditorReady==2){
			UE.getEditor("js-wenda-editor-content").setContent($("#js-editor-content-dup").html());
		}
		//duplicate div may use textare instead of;
		$("#js-wenda-editor").show();
	});


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


	$("#js-wenda-editor-cancel").click(function(){
		$("#js-wenda-editor").hide();
		$("#js-content-main").show();
	});

	$("#js-wenda-editor-submit").click(function(){
		var $this=$(this),title,content,minLength;

		if($this.hasClass("disabled")) return ;
		
		if (checkTitle.call($("#js-wenda-editor-title")) === false) {
			return ;
		}
		title=$("#js-wenda-editor-title").val();

		content=UE.getEditor("js-wenda-editor-content").getContent();

		minLength=$.trim(UE.getEditor("js-wenda-editor-content").getContentTxt()).length;
		//console.log(minLength)
		if(!minLength){
			content="";
		}
		if (content.length > 20000) {
	        util.error('#js-wenda-editor-content .errortip','超过字数上限，最多输入20000字');
			return ;
		}
		if($("#js-tags .onactive").length == 0){
			//$("#tagcontent").addClass("error");//.next("p").text("请选择以下标签！");
	        util.error('#js-tags ~ .errortip','问题至少选择1个分类');
			return;
		}else{
	        util.error('#js-tags ~ .errortip','');
		}

		var arr = [];
		$('#js-tags .onactive').each(function(index,obj){
			arr.push($(obj).attr("data-id"));
		});


		$this.addClass("disabled").text("保存...");
		$.ajax({
			url:"/wenda/editwenda",
			data:{
				title:title,
				content:content,
				id:$this.attr("data-id"),
				label_ids:arr.join(",")
			},
			dataType:"json",
			type:"post",
			success:function(data){
				if(data.result==0){
					$(popEle).html('<i class="icon-tick2"></i> 修改成功！').show();
            		popLeave();
					setTimeout(function(){location.reload()},1000);
					/*layer.calert("修改成功！  ",function(){
						window.location.reload();
					});*/
				}
				else{
					util.msg.call($this,data.msg);
				}
			},
			error:function(){
				util.msg.call($this,"服务错误，请稍后重试！");
			},
			complete:function(){
				$this.removeClass("disabled").text("保存");
			}

		});
	});
	//加关注
	var isAjax=0;
	$('.js-collection-btn').on('click',function(){
        if (!OP_CONFIG.userInfo) {
            function popLogin() {
                require.async('login_sns',
                function(login) {
                    login.init();
                });
            };
            popLogin();
            return;
        }
		if(isAjax) return;
		isAjax=1;
		var obj=$(this);
		var id=obj.attr("data-id");
		var fNum=obj.find(".js-detail-follow");
		var act="add";
		if(obj.attr('title') === '取消关注'){
			act="del"
		}

		var url="/wenda/wendafollow";//folllow
		$.ajax({
			type: "get",
			url: url,
			dataType:"json",
			data: {
				bbsId:id,
				act:act
			},
			success: function(res){
				isAjax=0;
				if(res.result==0){
					if(act=="add"){
						obj.attr('title','取消关注').find('i').removeClass('icon-heart').addClass('icon-heart-revert');
						fNum.text(parseInt(fNum.text())+1);
					}else{
						obj.attr('title','关注').find('i').removeClass('icon-heart-revert').addClass('icon-heart');
						fNum.text(parseInt(fNum.text())-1);
					}
				}else{
					layer.msg('操作失败，请稍后再试', 1, 1);
				}
			},
			error:function(){
				layer.msg('网络错误，请稍后再试', 1, 1);
            	isAjax=0;
        	}
		});
	});


	$(document).on("click",".js-edit",function(){
		var obj=$(this).closest(".ques-answer")
		var id=$(this).data("id");

		obj.find(".js-wenda-tool").hide();
		obj.find(".js-reply-tool").show();
		obj.find('.rich-text').hide()
		obj.find('.reply-textarea').show()
		var ue=""
		if($("#reply-textarea-"+id).hasClass('edui-imooc')){
			ue=UE.getEditor("reply-textarea-"+id)
			ue.setContent(ue.options.initialContent)
		}else{
			ue=UE.getEditor("reply-textarea-"+id,{
				initialFrameHeight:100,
				initialFrameWidth:788
			});

		}
		setTimeout(function(){ue.focus();},100)
		
		

	}).on("click",".js-reply-cancel",function(){
		var obj=$(this).closest(".ques-answer")
		obj.find(".js-wenda-tool").show();
		obj.find(".js-reply-tool").hide();
		obj.find('.rich-text').show()
		obj.find('.reply-textarea').hide()
	}).on("click",".js-reply-submit",function(e){
		e.preventDefault();
		var $this=$(this),
			$foot,
			$vbox,
			data,
			v,
			content;

		var obj=$this.closest(".ques-answer")
		var id=$this.data("id");
		var ue=UE.getEditor("reply-textarea-"+id)


		if ($this.hasClass("disabled")) return ;
		content=ue.getContent();
		data={};
		if($.trim(ue.getContentTxt()).length<3){
			util.msg.call($this,"回答字数不少于3个！");
			return ;
		}
		if(content.length>20000){
			util.msg.call($this,"回答字数不大于20000个！");
			return ;
		}

		$foot=$("#js-qa-ci-footer");
		if(($vbox=$foot.find(".verify-code")).length){
            v=$vbox.find("input").val();
            if(v.length==0){
                util.msg.call(this,"请输入验证码");
                return ;
            }
            data.verify_code=v;
		}
		data.content=content;
		data.reply_id=id;
		util.msg.call(this);
		$this.addClass("disabled").text("保存...");
		$.ajax({
			url:"/wenda/ajaxeditreply",
			type:"post",
			dataType:"json",
			data:data,
			success:function(data){
				if(data.result==0){
					$(popEle).html('<i class="icon-tick2"></i> 保存成功').show();
            		popLeave();
					setTimeout(function(){
						location.href=data.data;
					},1000);

				}
				else if(data.data === 1 && data.result === -1){
					if(obj.find(".verify-code").length) return ;
                    obj.prepend(cutil.getVerifyCodeBlock());
					$(popEle).html('<i class="icon-point-revert"></i> 请输入验证码').show();
            		popLeave();
                    //util.msg.call($this,"请输入验证码");
                    return
				}
				else{
					$(popEle).html('<i class="icon-point-revert"></i>'+ data.msg).show();
            		popLeave();
					//util.msg.call($this,data.msg);
                    $foot.find(".verify-code-around").trigger('click');
				}
			},
			complete:function(){
				$this.removeClass("disabled").text("保存");
			}
		})
	})



	
	//页面加载5秒后分享提示消失
    shareFrame=$(".js-share-statue");
    setTimeout(function(){shareFrame.hide();},5000);

var setTimer,interval=5000;
    $(".js-top-share .bdsharebuttonbox a").mouseenter(function(){
        shareFrame.show();
    }).mouseleave(function(){
        if(setTimer) clearTimeout(setTimer);
        setTimer=setTimeout(function(){
            shareFrame.hide();
        },interval);

    });


    var pnum=window.location.href.split("page=")
    if(pnum.length>1){
    	pnum=pnum[1].split("&")[0]
    	if(pnum!=1){
    		$('html,body').animate({scrollTop: $(".ans_num").offset().top}, 800)
    	}
    }
    
});
