<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        面试试题_面试宝典网
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375" />
    <meta property="wb:webmaster" content="c4f857219bfae3cb" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta name="Keywords" content="" />
    <meta name="Description" content="慕课网精品课程，为您提供专业的IT实战开发课程，包含前端开发、后端开发、移动端开发、数据处理、图像处理等各方面IT技能，课程全面、制作精良、讲解通俗易懂。"/>
    <link rel="stylesheet" href="{{asset('css/d79d81e9ab144c28aae8b073106e6881.css')}}" type="text/css" />
</head>
<body  id="List_courseId">
@extends('layouts.master')
@section('sidebar')
    @parent
<div id="main">
    <div class="container">
        <div class="course-content">
            <div class="course-nav-box">
                <div class="course-nav-hd">
                    <span>全部课程</span>
                    <a href="/about/recruit" class="for-teacher hide-text" title="应聘讲师" target="_blank">应聘讲师</a>
                </div>
                <div class="course-nav-row clearfix">
                    <span class="hd l">学院：</span>
                    <div class="bd">
                        <ul class="">
                            <li class="course-nav-item on" class="type" id="type">
                               <a href="#" class="leixing" value="0"> 全部</a>
                            </li>

                            <?php foreach($arr as $k=>$v){?>

                            <li class="course-nav-item"  class="type" id="type">
                               <a href="#" class="leixing" value="<?php echo $v['c_id']?>">
                               <?php echo $v['c_name']?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="course-nav-row clearfix">
                    <span class="hd l">专业：</span>
                    <div class="bd">
                        <ul class="">
                            <div id="zhuanye">
                            <li class="course-nav-item on" id="zhuan">
                               <a href="#" class="zhuan" value="0"> 全部</a>
                            </li>

                        <?php foreach($zhuan as $k=>$v){?>
                            <li class="course-nav-item " id="zhuan">
                                <a href="#" class="zhuan" value="<?php echo $v['d_name']?>">
                                <?php echo $v['d_name']?></a>
                            </li>
                        <?php } ?>
                                </div>
                        </ul>
                    </div>
                </div>
              <div class="course-nav-row clearfix">
                    <span class="hd l">类型：</span>
                   <div class="bd">
                        <ul class="">
                            <div id="lei">
                            <li class="course-nav-item  on" id='lei'>
                                <a href="#" value="0" class="lei" value="0">全部</a>
                            </li>
                        <?php foreach($lei as $k=>$v){?>
                            <li class="course-nav-item " id="lei">
                                <a href="#" class="lei" value="<?php echo $v['t_name']?>">
                                    <?php echo $v['t_name']?></a>
                            </li>
                        <?php } ?>
                                </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="course-tool-bar clearfix">
                <div class="tool-left l">
                    <a href="/course/list?sort=last" class="sort-item">最新</a>
                    <a href="/course/list?sort=pop" class="sort-item active">最热</a>
                </div>
                <div class="l">
                    <span class="tool-item" style="display: none;">
                        <a class="follow-learn tool-chk" href="javascript:void(0);">跟我学</a>
                    </span>
                </div>
                <div class="tool-right r">
                                        <span class="tool-item total-num">
                        共<b>511</b>个课程
                    </span>
                    <span class="tool-item tool-pager">
                                                <span class="pager-num">
                            <b class="pager-cur">1</b>/<em class="pager-total">26</em>
                        </span>
                                                <a href="javascript:void(0)" class="pager-action pager-prev hide-text disabled">上一页</a>

                                                <a href="/course/list?page=2" class="pager-action pager-next hide-text">下一页</a>
                                            </span>
                </div>
            </div>
            <div class="course-list">
                <div class="js-course-lists" id="list">
                    <ul>


                    <?php foreach($shi as $k=>$v){?>
                        <li class="course-one">
                            <a href="xiang?id=<?php echo $v['c_id']?>" target="_self">


				<div class="course-list-img">
                                    <img width="240" height="135" alt="" src="<?php                                         if($v['c_college']=="软工学院"){
                                        echo "{{asset('images/logo/软工.jpg')}}";
                                    }elseif($v['c_college']=="移动通信学院"){
                                        echo "{{asset('images/logo/移动.jpg')}}";
                                    }else if($v['c_college']=="云计算学院"){
                                       echo  "{{asset('images/logo/云计算.jpg')}}";
                                    }elseif($v['c_college']=="高翻学院"){
                                        echo  "{{asset('images/logo/高翻.jpg')}}";
                                    }elseif($v['c_college']=="国际经贸学院"){
                                        echo  "{{asset('images/logo/经贸.jpg')}}";
                                    }elseif($v['c_college']=="建筑学院"){
                                        echo  "{{asset('images/logo/建筑.jpg')}}";
                                    }elseif($v['c_college']=="游戏学院"){
                                        echo  "{{asset('images/logo/游戏.jpg')}}";
                                    }elseif($v['c_college']=="网工学院"){
                                        echo  "{{asset('images/api/logo/网工.jpg')}}";
                                    }elseif($v['c_college']=="传媒学院"){
                                        echo  "{{asset('images/logo/传媒.jpg')}}";
                                    }?>">
                                </div>

                                <h5>
                                    <span><a href="xiang?id=<?php echo $v['c_id']?>" target="_self"><?php echo $v['c_name']?></a></span>
                                </h5>
                                <div class="tips">
                                    <p class="text-ellipsis">类型:<?php echo $v['c_type']?></p>
                                    <p class="text-ellipsis">专业:<?php echo $v['c_direction']?></p>
                                    <span class="l ">更新完毕</span>

                <span class="l ml20">
                                <?php  echo $v['c_num']?>
                                人学习</span>
                                </div>
            <span class="time-label">
                                    9小时17分钟 | 初级
                            </span>
                                <b class="follow-label">跟我学</b>
                            </a>
                        </li>
                    <?php } ?>

                    </ul>
                </div>

            </div>

                    <style>
			.pager{
			    position:absolute;
			    left:400px;
			    bottom:-20px;
			}
                        .pager li{
                            float:left;
                            margin-left:100px;
			    font-size:xx-large;
                        }
                    </style>
             <?php echo $shi->render(); ?>
        </div>
    </div>

</div>


<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="/user/feedback" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="http://www.imooc.com/mobile/app" >
        <div class="elevator-app-box">
        </div>
    </a>
    <a class="elevator-top" href="javascript:;" style="display:none" id="backTop"></a>
</div>

<script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
<script>
    $(document).on("click",".leixing",function(){
        var leixing=$(this).attr('value');
        $.post('s',{
            leixing:leixing
        },function(data){

            $("#list").html(data)

        })
    })

    $(document).on("click",".leixing",function(){
        $("#type.course-nav-item").removeClass("on")
        $(this).parent().attr("class","course-nav-item on");

        var leixing=$(this).attr('value');
        $.post('sou',{
            leixing:leixing
        },function(data){
            //alert(data)
            $("#zhuanye").html(data)
        })
    })

    $(document).on("click",".zhuan",function(){
        $("#zhuan.course-nav-item").removeClass("on");
        $(this).parent().attr("class","course-nav-item on");
        var zhuanye=$(this).attr('value');
        var lei=$("#lei").children(".on").children().attr('value');
        $.post('zhuanye',{
            zhuan:zhuanye,
            lei:lei
        },function(data){
            $("#list").html(data)
        })
    })

    $(document).on('click','.lei',function(){
        $("#lei.course-nav-item").removeClass("on");
        $(this).parent().attr('class','course-nav-item on');
       var lei=$(this).attr('value');
       var zhuan=$("#zhuanye").children(".on").children().attr('value');
       $.post('zhuanye',{
           zhuan:zhuan,
           lei:lei
       },function(data){
          // alert(data)
           $("#list").html(data)
       })
    })
</script>

</body>
@endsection
</html>
