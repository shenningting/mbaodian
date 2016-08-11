<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册页面</title>
</head>
<body>
	<form method="post" action="registera" onsubmit="return check();" name="aa">
		<table cellpadding="5" >
			<tr>
				<td>用户名</td>
				<td><input type="text" name='username' placeholder=' 输入用户名' id='username' onblur="checkname();"><span id="name_sp"></span></td>
			</tr>
			<tr>
				<td>密　码</td>
				<td>
				<span id="box"><input type="password" name='password' value='' placeholder=' 输入密码'></span>
				<span id="box3"><a href="javascript:void(0)"  onclick='show();'>显示密码</a></span>
				</td>
			</tr>
			<tr>
				<td>昵　称</td>
				<td><input type="text" name='nickname' placeholder=' 输入昵称' id='nickname' onblur="checknickname();"><span id="nick_sp"></span></td>
			</tr>
			<tr>
				<td>邮　箱</td>
				<td><input type="text" name='email' placeholder=' 输入邮箱' id='email' onblur="checkemail();"><span id="email_sp"></span><button id="test">获取验证码</button></td>
				<td><input type="text" id="yzm" class="yan"></td><td><font color="red"><span id="pan"></span></font></td>
			</tr>
			<tr>
				<td>手机号</td>
				<td><input type="text" name='phone' placeholder=' 输入手机号' id='phone' onblur="checkphone();"><span id="phone_sp"></span></td>
			</tr>
			<tr>
				<td><input type="submit" value='注 册'></td>
				<td><input type="reset"  value="取 消"></td>
			</tr>
			<input type="text" value="" id="yin">
		</table>
	</form>
</body>
</html>
<!-- <script src="./js/jquery-1.8.3.min.js"></script> -->
<script>
	

	function checkname(){
		var username = document.getElementById('username').value;
       // alert(username)
		//长度为4～20个字符的英文字母，数字或下划线
		var reg = /^([a-zA-Z0-9]|[_]){4,20}$/;
		if(reg.test(username)){
			document.getElementById('name_sp').innerHTML = 'OK';
		}else{
			document.getElementById('name_sp').style.color='red';
			document.getElementById('name_sp').innerHTML = '格式错误';
		}
	}

	function checkpwd(){
		var pwd = document.getElementById('pwd').value;
		//长度6-16位  不能为同一个字符  不能全是数字  只能有数字、字母和常用特殊字符
		var reg = /^(?=.{6,16}$)(?![0-9]+$)(?!.*(.).*\1)[0-9a-zA-Z]+$/;
		if(reg.test(pwd)){
			document.getElementById('pwd_sp').innerHTML = 'OK';
		}else{
			document.getElementById('pwd_sp').style.color='red';
			document.getElementById('pwd_sp').innerHTML = '格式错误';
		}
	}

	function checknickname(){
		var nickname = document.getElementById('nickname').value;
		//	英文、数字、下划线6-20位字符
		var reg= /^[\w\_]{6,20}$/;
		if(reg.test(nickname)){
			document.getElementById('nick_sp').innerHTML = 'OK';
		}else{
			document.getElementById('nick_sp').style.color='red';
			document.getElementById('nick_sp').innerHTML = '格式错误';
		}
	}

	function checkemail(){
		var email = document.getElementById('email').value;
		var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if(reg.test(email)){
			document.getElementById('email_sp').innerHTML = 'OK';

			document.getElementById('test').disabled=false;
		}else{
			document.getElementById('email_sp').innerHTML = '格式错误';
			document.getElementById('email_sp').style.color='red';
			document.getElementById('test').disabled=true;
		}
	}


	function checkphone(){
		var phone = document.getElementById('phone').value;
		var reg = /^1\d{10}$/;
		if(reg.test(phone)){
			document.getElementById('phone_sp').innerHTML = 'OK';
		}else{
			document.
			('phone_sp').style.color='red';
			document.getElementById('phone_sp').innerHTML = '格式错误';
		}
	}

	function check(){
		 checkname() && checkpwd() && checknickname() && checkemail() && checkphone();
		 return true;
	}

	function show(){
		if(this.aa.password.type='password'){
			box.innerHTML = "<input type='text' name='password'  value="+this.aa.password.value+">";
			box3.innerHTML = "<a href='javascript:void(0)' onclick='hid();'>隐藏密码</a>";
		}
	}
	function hid(){
		if(this.aa.password.type='text'){
			box.innerHTML = "<input type='password' name='password'  value="+this.aa.password.value+">";
			box3.innerHTML = "<a href='javascript:void(0)' onclick='show();'>显示密码</a>";
		}	
	}
</script>

<script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
<script>
	$(function(){
		$("#yzm").hide();
		$("#yin").hide();

	})
    $(document).on('click','#test',function(){
		$("#yzm").show();
		var email = $("#email").val();
		$.post('send',
		{
			email:email
		},function(data){
			$("#yin").attr('value',data);
		})
	})
	$(document).on("blur",".yan",function(){
		var yzm=$("#yzm").val();
		var yin=$("#yin").val();
		if(yzm==yin){
			$("#pan").html("ok")
		}else{
			$("#pan").html("验证码错误")
		}
	})
</script>