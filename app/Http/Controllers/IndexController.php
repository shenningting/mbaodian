<?php

namespace App\Http\Controllers;
use DB;
class IndexController extends Controller
{
    public function index(){
        $shi=DB::table('shiti')->orderBy("click","desc")->limit(8)->get();
        //print_r($shi);die;
        return view('index/index',['shi'=>$shi]);
    }
}
