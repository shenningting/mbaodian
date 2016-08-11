<ul class="clearfix" style="margin-left:0px;">
                @foreach($arr as $key=>$value)
                    <li class="course-one" style=" width:200px; border:1px solid #ccc;">
                        <a href="#" title="{{$value['r_id']}}">
                                <b><font color="red">{{$value['company_name']}}</font></b><br><br>
                                <span style="display:block;">招聘职位:<font color='#999d9c'>{{$value['position_name']}}</font></span>
                                <span style="display:block; margin-top:10px;">工作经验:{{$value['experience']}}</span>
                                <span style="display:block;">转正薪资:{{$value['money']}}</span>
                                <span style="display:block;">学历要求:{{$value['education']}}</span>
                             
                
                            <div class="tags">
                                <span>{{$value['position_name']}}</span>
                                <span>{{$value['experience']}}</span>
                                <span>{{$value['money']}}</span>
                            </div>
                            <div style=" margin-top:60px;">
                                <span style="margin-left:60px;">猛戳查看详情</span>
                                <img src="{{asset('images/手指.jpg')}}" alt="←-----" width="25px;" height="25px;">
                            </div>
                        </a>
                    </li>
                @endforeach
                </ul>
