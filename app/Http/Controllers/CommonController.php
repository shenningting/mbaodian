<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
session_start();
class CommonController extends ExcessController
{
	public function login(){
		//session_start();
		$email=$_POST['email'];
		//echo $email;die;
		$pwd=$_POST['password'];
		$arr = DB::select("select * from qt_user where u_name='$email'");
		// //print_r($arr);die;
		// $user_id=$arr[0]['u_id'];
		// $_SESSION['user_id']=$user_id;
		// $_SESSION['user_email']=$email;
		if($arr){
			foreach($arr as $k=>$v){
				if($pwd==$v['u_pwd']){
					$user_id=$v['u_id'];
					$_SESSION['user_id']=$user_id;
					$_SESSION['u_email']=$email;
					//echo $_SESSION['u_email'];die;
					echo "<script>alert('登陆成功');location.href='/index'</script>";
				}else{
					echo "<script>alert(密码错误);</script>";
				}
			}

			}else{
				echo "<script>alert('用户名不存在');location.href='/login'</script>";
			}

	}

	public function register(){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$nickname=$_POST['nickname'];
		$arr = DB::insert("insert into qt_user(u_name,u_pwd,u_nickname) values('$email','$password','$nickname')");
		if($arr){
			return redirect('/login');
		}else{
			alert('注册失败');
			return false;
		}
	}
}
