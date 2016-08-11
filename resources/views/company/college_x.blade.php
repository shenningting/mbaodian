<ul class="content-item-box clearfix">
@foreach($exam as $key=>$value)
<li>
<a href="college_exam?id={{$value['s_id']}}">
<div class="content-item-brief">
<h1>{{$value['s_logo']}}</h1>
<div class="web-logoimg">
<img src="http://123.56.249.121/android/web/{{$value['s_img']}}" style="width:50px; height:50px;" />
</div>
<div class="exam-foot">已有{{$value['click']}}人参加</div>
<dl class="exam-info">
<dd><span class="link-green"></span></dd>
<dd class="exam-btn"><span class="btn  btn-block btn-primary" >查看详情</span></dd>
</dl>
</div>                                               
</a> 
</li>
@endforeach
</ul>