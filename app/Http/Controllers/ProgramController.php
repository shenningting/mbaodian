<?php
/*
 *招聘信息控制器
 *梁坤
 */
namespace App\Http\Controllers;
use DB;
class ProgramController extends Controller
{
	/*
	 *招聘信息显示
	 */
    public function program(){
        $all = DB::table('position')->where("p_up_id",0)->get();
        foreach ($all as $key => $value) {
            $two = DB::table('position')->where("p_up_id",$value['p_id'])->get();

            foreach ($two as $k => $v) {
             $three = DB::table('position')->where("p_up_id",$v['p_id'])->get();
             $two[$k]['three']=$three;
            }
            $all[$key]['two']=$two;
        }
        //print_r($all);die;
    	$data=DB::table('recruit')->orderBy('r_id','desc')->paginate(10);
        //print_r($data);die;
        return view('program/program',['all'=>$all,'data'=>$data]);
    }
   /*
     *根据职位查询信息
     */
    public function position(){
        $p_name=$_GET['p_name'];
        $arr = DB::table('recruit')->where('position_name',"$p_name")->get();
        return view('program/position',['data'=>$arr]);
    }



    /*
	 *招聘信息详情页面
	 */
    public function etc_sel(){
    	$id=$_GET['id'];
    	$data = DB::table('recruit')->where('r_id',"$id")->first();
    	return view('program/etc_sel',['arr'=>$data]);
    }



}
