<div class="evaluation-con" id="list">
    <?php for($ping as $k=>$v){?>


    <div class="content-box">
        <a href="#" class="img-box">
            <img src="{{asset('images/u.jpg')}}" alt="518000">
        </a>
        <div class="user-info clearfix">
            <a href="http://www.imooc.com/space/u/uid/2738371" class="username"><?php echo $v['user_phone']?></a>
            <div class="star-box">
                <img src="{{asset('images/xing.jpg')}}" width="20" height="20">
                <img src="{{asset('images/xing.jpg')}}" width="20" height="20">
                <img src="{{asset('images/xing.jpg')}}" width="20" height="20">
                <img src="{{asset('images/xing.jpg')}}" width="20" height="20">
                <img src="{{asset('images/xing.jpg')}}" width="20" height="20">
            </div>
        </div>
        <p class="content"><?php echo $v['p_con']?></p>
        <div class="info">
            <span class="time">时间：<?php echo $v['e_addtime']?></span>
        </div>
    </div>
    <?php } ?><!--content end-->
</div>