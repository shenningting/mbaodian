<?php

namespace App\Http\Controllers;

class SmsController extends ExcessController
{
    //消息列表
    public function messages(){
        return view('sms/messages');
    }

    //消息列表
    public function messagesone(){
        return view('sms/messagesone');
    }
    //消息列表
    public function messagestwo(){
        return view('sms/messagestwo');
    }
    //通知列表
    public function notices(){
        return view('sms/notices');
    }

}
