<?php

namespace App\Http\Controllers;

class UserController extends ExcessController
{
    //个人资料
    public function setprofile(){
        return view('user/setprofile');
    }
    //头像设置
    public function setavator(){
        return view('user/setavator');
    }
    //手机设置
    public function setphone(){
        return view('user/setphone');
    }
    //邮箱验证
    public function setverifyemail(){
        return view('user/setverifyemail');
    }
    //修改密码
    public function setresetpwd(){
        return view('user/setresetpwd');
    }
    //绑定账号
    public function setbindsns(){
        return view('user/setbindsns');
    }
}
