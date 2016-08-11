<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>招聘详情--面试宝典</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375" />
    <meta property="wb:webmaster" content="c4f857219bfae3cb" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="Cache-Control" content="no-transform " />

    <meta name="Keywords" content="" />

    <meta name="Description" content=""/>




    <script type="text/javascript">


        eval(function(p,a,c,k,e,r){e=function(c){return c.toString(36)};if('0'.replace(0,e)==0){while(c--)r[e(c)]=k[c];k=[function(e){return r[e]||e}];e=function(){return'[235-9a-dfg]'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('!3(){5 6=a;5 7=3(t){9(typeof b=="undefined"){c d}5 2=f b();try{2.open("GET","/index/ajaxscsts?s="+t,true);2.onreadystatechange=3(){9(2.readyState==4&&2.status==200){9(t&&2.responseText==1)window.location.reload()}};2.send()}catch(e){c d}};5 8=f Image();8.onload=3(){clearTimeout(6);6=a;7(0)};8.onerror=3(){7(1)};6=setTimeout(3(){7(1)},3000);8.src=\'http://g.mukewang.com/g/img/common/logo.png\'}()',[],17,'||xhr|function||var|timer|cdnpost|imgobj|if|null|XMLHttpRequest|return|false||new|static'.split('|'),0,{}))

        var OP_CONFIG={"module":"course","page":"program"};
        var isLogin = 0;
        var is_choice = "";
        var seajsTimestamp="v=201603251711";

    </script>



    <link rel="stylesheet" href="{{asset('css/0c74dba8c4534515ae8a4e24d2ab8b9d.css')}}" type="text/css" />
</head>
<body  id="List_courseId">

@extends('layouts.master')
@section('sidebar')
    @parent

	<div style=" width:600px;  margin-left:400px; margin-top:50px; margin-bottom:50px;">
		<span style="font-size:30px;"><?php echo $arr['company_name']?></span>
		<span style=" float:right;padding-top:20px;">发布时间:<?php echo $arr['release_date']?></span>
		<hr>
		<span>行业：<?php echo $arr['main_business']?></span>
		<span style=" margin-left:50px;">性质：<?php echo $arr['nature']?></span>
		<span style=" margin-left:50px;">规模：<?php echo $arr['c_number']?></span>
		<br>
		<br>
		<span style=" float:left;">薪资待遇：<?php echo $arr['money']?></span>
		<span style="margin-left:200px;">学历要求：<?php echo $arr['education']?></span>
		<br>
		<br>
		<span >招聘职位：<?php echo $arr['position_name']?></span>
		<span style="margin-left:200px;">工作年限：<?php echo $arr['experience']?></span>
		<br>
		<br>
		<span>工作地址：<?php echo $arr['c_region'].$arr['c_address']?></span>
		<br>
		<br>
		<span>公司福利待遇：<?php echo $arr['welfare']?></span>
		<hr>
		<span><h3>职位描述：</h3><?php echo $arr['r_describe']?></span>
		<hr>
		<span><h3>公司简介：</h3><?php echo $arr['introduce']?></span>
		<hr>
		<h3>联系方式：</h3>
		<span>联系老师：<?php echo $arr['name']?></span>
		<br>
		<span>联系电话：<?php echo $arr['phone']?></span>
		<span style=" margin-left:30px;">QQ：<?php echo $arr['qq']?></span>
		<br>
		<span>公司网址：<?php echo $arr['c_html']?></span>
	</div>



</body>
    @endsection
</html>
