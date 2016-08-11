<ul class="clearfix">
        @foreach($data as $q=>$w)
            <li class="position_list_item" data-jobid="1621796" data-positionid="1621796" data-salary="25k-40k" data-company="51Talk 无忧英语" data-positionname="运营总监" data-companyid="119153">


            

                <div class="pli_top">
                    <div class="fl pli_top_l">
                        <div class="position_name">
                            <!--  -->
            <h2 class="fl" style=" font-size:20px;"><a href="etc_sel?id={{$w['r_id']}}" target="_blank" class="position_link fl wordCut" data-index="0" data-lg-tj-id="4m00" data-lg-tj-no="0001" data-lg-tj-cid="1621796">{{$w['position_name']}}<span>[北京][{{$w['c_region']}}]</span></a></h2>
                            <!-- 此处需要和后台确认 -->
                            <span class="fl">{{$w['release_date']}}</span>
                        </div>
                        <div>
                            <span class="salary fl">{{$w['money']}}</span>
                            <span><!-- <i class="experience"></i>&nbsp;  -->{{$w['experience']}}</span> / <span>{{$w['education']}}</span>
                        </div>
                    </div>
                    <div class="fr pli_top_r">
                        <div class="company_name wordCut">
                    <span style=" font-size:16px;"><font color="black">{{$w['company_name']}}</font></span>
                        </div>
                        <div class="industry wordCut">
                            <span> {{$w['main_business']}}</span> / <span>{{$w['nature']}}</span>
                        </div>
                    </div>
                </div>
                <div class="pli_btm">
                    <div class="pli_btm_l fl wordCut">
                        “{{$w['welfare']}}”
                    </div>
                    <div class="pli_btm_r fl">
                          <span>{{$w['r_number']}}</span>
                          <span>{{$w['r_type']}}</span>                                    
                                                                        </div>
                </div>

            



            </li>
                @endforeach       
                                    </ul>
