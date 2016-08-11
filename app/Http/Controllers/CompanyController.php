<?php
/*
 *公司试题控制器
 *梁坤
 */
namespace App\Http\Controllers;
use DB;
class CompanyController extends Controller
{
	//公司列表
	public function index(){
		$re = "select * from direction";
		$ra = DB::select($re);
		$sql = "select * from company";
		$arr = DB::select($sql);
		$exam = DB::table('shiti')->simplePaginate(9);
		return view('company/index',['arr'=>$arr,'re'=>$ra,'exam'=>$exam]);
	}
	//根据专业查询试题
	public function college(){
		$name = $_GET['name'];
		$arr = DB::table('shiti')->where('direction_name',"$name")->simplePaginate(9);
		return view('company/college',['exam'=>$arr]);
	}
	//根据专业以及公司查询试题
	public function college_x(){
		$name_z = $_GET['name_z'];
		$name_x = $_GET['name_x'];
		if(empty($name_z)){
		$arr = DB::table('shiti')->where('company_name',"$name_x")->simplePaginate(9);
		}else{
		$arr = DB::table('shiti')->where('company_name',"$name_x")->where('direction_name',"$name_z")->simplePaginate(9);
		}
		return view('company/college_x',['exam'=>$arr]);
	}
	//查看试题
	public function college_exam(){
		$id = isset($_GET['id'])?$_GET['id']:'';
		//$state = session_status();
		//print_r($_SESSION);die;
		if(!isset($_SESSION)){
		session_start();
		}
		if(!empty($id)){
		$sql = "select click from shiti where s_id='$id'";
		$click=DB::select($sql);
		$click_1 =($click[0]['click'])+1;
		$upd = "update shiti set click='$click_1' where s_id='$id'";
		$upd_sav = DB::update($upd);
		$_SESSION['id']=$id;
	                        }
		$id=$_SESSION['id'];
		$count=DB::table('exam')->where('company_id',"$id")->count();
		if($count==0){
		 echo "<script>alert('暂无试题');location.href='company'</script>";
				}else{
		$data=DB::table('exam')->where('company_id',"$id")->paginate(1);
		return view('company/college_exam',['arr'=>$data]);
				     }
	}




}
