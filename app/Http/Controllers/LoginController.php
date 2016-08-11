<?php

namespace App\Http\Controllers;
use DB;

session_start();

class LoginController extends Controller
{
    public function login(){
        return view('login/login');
    }
    public function name(){
        $u_phone=$_POST['u_name'];
       // echo $u_phone;die;
        $arr=DB::table('users')->where('user_phone',"$u_phone")->first();
        if($arr){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function email(){
        $u_email=$_POST['u_name'];
        $arr=DB::table('users')->where('user_email',"$u_email")->first();
        if($arr){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function name_pwd(){
        $u_name=$_POST['u_name'];
        $u_pwd=$_POST['u_pwd'];
        //echo $u_name,$u_pwd;die;
        $arr=DB::table('users')->where('user_phone',"$u_name")->where('user_pwd',"$u_pwd")->get();
       //print_r($arr);die;
        if($arr){
            echo 3;
        }else{
            echo 4;
        }
    }
    public function email_pwd(){
        $u_name=$_POST['u_name'];
        $u_pwd=$_POST['u_pwd'];
        //echo $u_name,$u_pwd;die;
        $arr=DB::table('users')->where('user_email',"$u_name")->where('user_pwd',"$u_pwd")->get();
        //print_r($arr);die;
        if($arr){
            echo 3;
        }else{
            echo 4;
        }
    }
    public function name_deng(){
        $u_name=$_POST['u_name'];
        $u_pwd=$_POST['u_pwd'];
	$_SESSION['username']=$u_name;
//	echo $_SESSION['username'];die;
        $arr=DB::table('users')->where('user_phone',"$u_name")->where('user_pwd',"$u_pwd")->get();
        //print_r($arr);die;
        if($arr){
	$_SESSION['u_id']=$arr[0]['user_id'];
            echo 5;
        }else{
            echo 6;
        }
    }
    public function email_deng(){
        $u_name=$_POST['u_name'];
        $u_pwd=$_POST['u_pwd'];
	$_SESSION['username']=$u_name;
        $arr=DB::table('users')->where('user_email',"$u_name")->where('user_pwd',"$u_pwd")->get();
        //print_r($arr);die;
        if($arr){
	 $_SESSION['u_id']=$arr[0]['user_id'];
            echo 5;
        }else{
            echo 6;
        }
    }
    //注册
    public function register(){
        return view('login/register');
    }
    public function reg(){
//	echo "ssssss";die;
        $name=$_POST['username'];
        $pwd=$_POST['password'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $a_name=DB::table('users')->where('user_name',"$name")->first();
        if($a_name){
            echo "<script>alert('用户名已存在');location.href='index'</script>";
        }else{

            if(DB::table('users')->where('user_email',"$email")->first()){

                echo "<script>alert('邮箱已存在');location.href='index'</script>";
            }else{
                if(DB::table('users')->where('user_phone',"$phone")->first()){
                    echo "<script>alert('手机号已存在');location.href='index'</script>";
                }else{

                $arr=DB::insert("insert into users(user_name,user_pwd,user_email,user_phone) values('$name','$pwd','$email','$phone');");
                    if($arr){
			$_SESSION['username']=$name;
                        echo "<script>alert('注册成功');location.href='index'</script>";
                    }else{
                        echo "<script>alert('注册失败');location.href='index'</script>";
                    }



                }
            }
        }


    }

    public function out(){
        unset($_SESSION['username']);
        echo "<script>alert('退出成功');location.href='index'</script>";
    }




 }
