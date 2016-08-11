
    <?php foreach($article as $k=>$v){?>
    <div class="article-lwrap ">
        <!-- text -->
        <input type="hidden" id="a_id" value="<?php echo $v['a_id']?>">
        <div class="">
            <h3 class="item-title">
                <a href="/article/5961" class="title-detail"><?php echo $v['a_title']?></a>
            </h3>
            <p class="item-bd"><?php echo $v['a_con']?></p>
            <div class="item-btm clearfix">
                <ul class="l left-info">
                    <li class="hd-pic">
                        <a class="publisher-hd" href="/u/3082774/articles" target="_blank">
                            <img src="" alt="" width="20" height="20" />
                        </a>
                        <a class="publisher-name" href="/u/3082774/articles" target="_blank">用户</a>
                    </li>
                    <li class="now-tag">
                        <a class="item-tag" href="/article/index/cid/105/page" target="_blank"><?php echo $v['a_type']?></a>
                    </li>
                    <li class="pass-time"><span><?php echo $v['a_addtime']?></span></li>
                    <li class="pass-time"><span><?php echo $v['a_num']?>浏览</span></li>
                </ul>
                <div class="r right-info">
                    <div class="favorite l" id="zan" value="<?php echo $v['a_id']?>">
                        <img src="{{asset('images/zan.jpg')}}"  class="zan" width="15" height="20">
                        <em >以赞
                            <?php echo $v['a_num']?>
                        </em>
                    </div>
                    <div class="item-judge l">
                        <i class="icon sns-comment"></i><em>评论 0</em>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
