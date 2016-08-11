define(function(require, exports, module){
	require('common');
	require("/static/component/base/placeholder/placeholder.js");
	require("/static/component/base/util/validate.js");
	var mbox=require("/static/page/user/messagebox.js");
    
	var util = require("/static/page/user/common/settingUitl.js");
	//prov city area plugin init;
	$('#province-select').change(function(){
		$('#city-select').text('').append("<option value='0'>选择城市 </option>");
		$('#area-select').text('').append("<option value='0'>选择区县 </option>");
		$.get('/user/ajaxchangeprov', 'id='+$(this).val(),function(data){
			if(data&&data.result==1){
				var $c=$("#city-select"),
					d=data.data,
					len=d.length,
					i=0;
					//$c.append("<option value='0'>选择城市 </option>");
					for(;i<len;i++){
						$c.append("<option value="+d[i].id+" >"+d[i].name+ " </option>");
					}
			}
		},'json')
	});
	
	$('#city-select').change(function(){
		$('#area-select').text('').append("<option value='0'>选择区县 </option>");
		$.get('/user/ajaxchangecity', 'id='+$(this).val(),function(data){
			if(data&&data.result==1){
				var $c=$("#area-select"),
					d=data.data,
					len=d.length,
					i=0;
					//$c.append("<option value='0'>选择区县 </option>");
					for(;i<len;i++){
						$c.append("<option value="+d[i].id+" >"+d[i].name+ " </option>");
					}
			}

		},'json')
	});


	function formOnerror(e){
		var $t,$d;
		if(e._relateField&&e.tip){
			$t=$(e._relateField);
			$t.addClass("rlf-field-error").next(".rlf-tip-wrap").html(e.tip).addClass("rlf-tip-error");
			($d=$t.data("placeholder-textinput"))&&$d.addClass("rlf-field-error");
		}
	}

	function formOnvalid(e){
		var $t,$d;
		if(e._relateField){
			$t=$(e._relateField);
			$t.removeClass("rlf-field-error").next(".rlf-tip-wrap").removeClass("rlf-tip-error").empty();
			($d=$t.data("placeholder-textinput"))&&$d.removeClass("rlf-field-error");
		}
	}

	$("#profile").validateSetup({
		fields:{
			"aboutme":{
				rules:[{
					rule:function(cb,v){
						if(v.length>128){
							return "个性签名不能超过128个字符！";
						}
					}
				}]
			}
		},
		onerror:formOnerror,
		onvalid:formOnvalid
	});
    
    $("#job").change(function(){
		if(!!$(this).val()){
			formOnvalid.call(this,{_relateField:this});
		}
		else{
			formOnerror.call(this,{_relateField:this,tip:"请选择职位！"});
		}
	});

	$("#profile-submit").click(function(){

		var $this=$(this),$form;
		if($this.text()=='正在保存...'){ return;}
		$this.text("正在保存...");

        if( $('.rlf-select').val() == '' ) {
            $this.text("保存");
            $('.rlf-select').next('.rlf-tip-wrap').addClass('rlf-tip-error').show().html('请选择职位！')
            return;
        }
        
        $form=$this.closest("form");	
        
		$form.validate({
			success:function(vals){
                                
				var postData={
					type:1  
				};
				postData.job = $("#job").val();
				postData.sex = $("#profile input[name='sex']:checked").val();

				postData.nickname=vals.nickname;
				postData.about=vals.aboutme;
				postData.province=$("#province-select").val();
				postData.city=$("#city-select").val();
				postData.area=$("#area-select").val();
				$.ajax({
					url:"/user/ajaxsetinfo",
					data:postData,
					method:"post",
					dataType:"json",
					success:function(data){
						if(data.result==1){
							util.layerInfo("修改成功！");
						}
						else{
							util.layerError(data.msg||data.data);
						}
						$this.text("保存");
					},
					error:function(){
						util.layerError("修改失败！");
						$this.text("保存");
					}
				});

			},
			error:function(){
				$this.text("保存");
			}
		});


	});


});
