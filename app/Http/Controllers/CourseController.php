<?php

namespace App\Http\Controllers;
use DB;
class CourseController extends Controller
{
    public function course(){
        //学院
        $sql="select c_id,c_name from college where c_del=0";
        $arr=DB::select($sql);
        //专业
        $sql="select d_name from direction";
        $zhuan=DB::select($sql);
        //类型
        $lei=DB::table('type')->get();
        //全部试题
        $shi=DB::table('college_questions')->simplePaginate(12);
        return view('course/course',['arr'=>$arr,'zhuan'=>$zhuan,'shi'=>$shi,'lei'=>$lei]);
    }
    public function sou(){
        if(!empty($_POST['leixing'])){
            $type= $_POST['leixing'];
        }else{
            $type='';
        }
        if($type==0){
            $sql="select d_id,d_name from direction";
        }else {
            $sql = "select d_id,d_name from direction where college_id=".$type;
        }
        $zhuan=DB::select($sql);
        //print_r($zhuan);die;
        //根据学院的id查询学院的名称
        $college = DB::table('college')->where('c_id',$type)->first();
        //类型的试题
       // $shi="select * from college_questions where c_college='".$college['c_name']."'";
        // $shi=DB::select($shi);
        $college_name=$college['c_name'];
        $shi=DB::table('college_questions')->where('c_college',"$college_name")->simplePaginate(12);

        return view('course/zhuan',['zhuan'=>$zhuan]);
    }



    public function s(){
        if(!empty($_POST['leixing'])){
            $type= $_POST['leixing'];
        }else{
            $type='';
        }
        if($type==0){
            //$shi="select * from college_questions";
            //$college_name=$college['c_name'];
            $shi=DB::table('college_questions')->simplePaginate(12);
        }else{
            $college = DB::table('college')->where('c_id',$type)->first();
            //类型的试题
            //$shi="select * from college_questions where c_college='".$college['c_name']."'";
            $college_name=$college['c_name'];
            $shi=DB::table('college_questions')->where('c_college',"$college_name")->simplePaginate(12);
        }

        //$shi=DB::select($shi);
        return view('course/shi',['shi'=>$shi]);
    }
    public function zhuanye(){
        $zhuan=$_POST['zhuan'];
        $lei=$_POST['lei'];
        if($zhuan=='0'){
            if($lei=='0'){
               // $zhi='都为空';
                $arr=DB::table('college_questions')->simplePaginate(12);
            }else{
               // $zhi='类型非空专业为空';
                $arr=DB::table('college_questions')->where('c_type',"$lei")->simplePaginate(12);
            }

        }else{
            if($lei=='0'){
               // $zhi='专业非空类型为空';
                $arr=DB::table('college_questions')->where('c_direction',"$zhuan")->simplePaginate(12);
            }else{
                //$zhi="都不为空";
               $arr=DB::table('college_questions')->where('c_direction',"$zhuan")->where('c_type',"$lei")->simplePaginate(12);

            }
        }

        //print_r($arr);die;
        return view('course/shi',['shi'=>$arr]);
    }
    public function xiang(){
        $id=$_GET['id'];
	//echo $id;die;
	$num=DB::table('college_questions')->where("c_id",$id)->first();
        $num=$num['c_num']+=1;
        $sq=DB::update("update college_questions set c_num='$num' where c_id=".$id);
        $arr=DB::table('college_questions')->where('c_id',$id)->first();
//print_r($arr);die;
	if(!isset($_SESSION)){
		session_start();
	}
	if(!empty($_SESSION['username'])){

		$username=$_SESSION['username'];

	//$username=$_SESSION['username'];
	$u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
	$u_id=$u_id['user_id'];
        $ping=DB::select("select * from users inner join e_ping on users.user_id=e_ping.u_id where u_id=$u_id order by p_id desc");
	//print_r($ping);die;
	}else{
		$ping=array();
	}
        if($arr['c_college']=='软工学院'){
            $arr['img']='http://123.56.249.121/api/logo/软工.jpg';
        }elseif($arr['c_college']=='移动通信学院'){
            $arr['img']='http://123.56.249.121/api/logo/移动.jpg';
        }elseif($arr['c_college']=='云计算学院'){
            $arr['img']='http://123.56.249.121/api/logo/云计算.jpg';
        }elseif($arr['c_college']=='高翻学院'){
            $arr['img']='http://123.56.249.121/api/logo/高翻.jpg';
        }elseif($arr['c_college']=='国际经贸学院'){
            $arr['img']='http://123.56.249.121/api/logo/经贸.jpg';
        }elseif($arr['c_college']=='建筑学院'){
            $arr['img']='http://123.56.249.121/api/logo/建筑.jpg';
        }elseif($arr['c_college']=='游戏学院'){
            $arr['img']='http://123.56.249.121/api/logo/游戏.jpg';
        }elseif($arr['c_college']=='网工学院'){
            $arr['img']='http://123.56.249.121/api/logo/网工.jpg';
        }elseif($arr['c_college']=='传媒学院'){
            $arr['img']='http://123.56.249.121/api/logo/传媒.jpg';
        }
      //  echo $arr['img'];die;
        return view('course/xiang',['arr'=>$arr,'ping'=>$ping]);
    }
	 public function con()
    {
        $con = $_POST['con'];
        $c_id = $_POST['c_id'];
        $e_addtime=date("Y-m-d H:i:s");
        if(!empty($_SESSION['username'])){
            echo "1";
        }else{
            //$username=$_SESSION['username'];
            //$u_id=table('users')->where("user_phone","$username")->orwhere("user_email","$username")->pluck('user_id');
           // $u_id=1;
		 if(!isset($_SESSION)){
                  session_start();
	         }
         $username=$_SESSION['username'];
         $u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
	$u_id=$u_id['user_id'];
            $sql="insert into e_ping(p_con,u_id,e_id,e_addtime) values('$con',$u_id,'$c_id','$e_addtime')";
            $re=DB::insert($sql);
            $ping=DB::select("select * from users inner join e_ping on users.user_id=e_ping.u_id where u_id=$u_id order by p_id desc");
            return view('course/ping',['ping'=>$ping]);
        }
    }

}
