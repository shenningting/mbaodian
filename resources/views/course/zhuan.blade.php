
                            <li class="course-nav-item on" id="zhuan">
                               <a href="#" class="zhuan"> 全部</a>
                            </li>

                        <?php foreach($zhuan as $k=>$v){?>
                            <li class="course-nav-item " id="zhuan">
                                <a href="#" class="zhuan" value="<?php echo $v['d_name']?>">
                                <?php echo $v['d_name']?></a>
                            </li>
                        <?php } ?>
 </div>


