<html>
<head>
    <meta charset="utf-8">
    <title>
        公司试题
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375" />
    <meta property="wb:webmaster" content="c4f857219bfae3cb" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="Cache-Control" content="no-transform " />

    <meta name="Keywords" content="" />

    <link rel="stylesheet" href="{{asset('css/d79d81e9ab144c28aae8b073106e6881.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/nowcoder-ui.css')}}">
</head>
@extends('layouts.master')
@section('sidebar')
    @parent

<body>
	   <div style="width:72%; height:80%; background:#fff; border:1px solid #ccc; margin-left:15%; margin-top:10px; margin-bottom:5px;">
	   	



		<div style="width:975px; height:465px; margin-top:20px;">
		@foreach($arr as $key=>$value)
		<div style="width:975px; height:55px; border-bottom:1px solid #ccc;"><img src="{{asset('images/wenhao.png')}}" style="float:left;">
		<span style=" font-size:26px; display:block; float:left; margin-top:5px;">
			<?php if($value['status']==1){
				echo "单选题";
			}else if($value['status']==0){
				echo "简答题";
			}
			?>
		</span></div>
		<?php if($value['status']==1){ ?>
			<div style=" width:975px; height:300px; ">
				<span style=" display:block; font-size:18px; margin-left:15px; margin-top:20px;">{{$value['e_name']}}</span>
				<span style=" display:block; border:1px solid #ccc; width:919px; height:47px; margin-left:25px; margin-top:20px;">
					<input type="radio" name="rad" value="a" style="display:block; margin-left:10px;margin-top:17px; float:left;"><span style="display:block; float:left; margin-top:15px; margin-left:10px;">{{$value['a']}}</span>
				</span>
				<span style=" display:block; border:1px solid #ccc; width:919px; height:47px; margin-left:25px; margin-top:20px;">
					<input type="radio" name="rad" value="a" style="display:block; margin-left:10px;margin-top:17px; float:left;"><span style="display:block; float:left; margin-top:15px; margin-left:10px;">{{$value['b']}}</span>
				</span>
				<span style=" display:block; border:1px solid #ccc; width:919px; height:47px; margin-left:25px; margin-top:20px;">
					<input type="radio" name="rad" value="a" style="display:block; margin-left:10px;margin-top:17px; float:left;"><span style="display:block; float:left; margin-top:15px; margin-left:10px;">{{$value['c']}}</span>
				</span>
				<span style=" display:block; border:1px solid #ccc; width:919px; height:47px; margin-left:25px; margin-top:20px;">
					<input type="radio" name="rad" value="a" style="display:block; margin-left:10px;margin-top:17px; float:left;"><span style="display:block; float:left; margin-top:15px; margin-left:10px;">{{$value['d']}}</span>
				</span>
			</div>
			<?php }else if($value['status']==0){ ?>
			<div style=" width:975px; height:300px; ">
				<span style=" display:block; font-size:18px; margin-left:15px; margin-top:20px;">{{$value['e_name']}}</span>

				<textarea name="" id="" cols="30" rows="10" style="margin-left:15px; width:902px; height:210px;"></textarea>

			</div>
			<?php }?>
			@endforeach
			<img src="{{asset('images/next.png')}}" alt="<<<<<>>>>>>" id="img" style=" margin-top:10px; margin-left:5px;">
			{{$arr->render()}}
		</div>
	   </div>
	   <div id="sel_hide" style="margin-left:15%; margin-top:10px; width:72%; background:#fff; border:1px solid #ccc; margin-bottom:10px;"><h3>&nbsp;&nbsp;&nbsp;正确答案为:</h3><span style="font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$value['e_an']}}</span></div>	   	
	   <script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
	   <script>
	   $(function(){
	   	$("#sel_hide").hide();
	   })
	   $(document).on("click","#img",function(){
	   	$("#sel_hide").show();
	   })
	   </script>
</body>
    @endsection
</html>
