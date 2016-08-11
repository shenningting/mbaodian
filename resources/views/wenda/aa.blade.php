 <?php foreach ($arr_com as $key => $val) {
                                 
                                  ?>
                         
                         
                            
                            <div class="ques-answer">
                    <div class="answer-con first" id="id_156829">
                        <div class="user-pic l">
                            <a href="http://www.imooc.com/u/1044131/bbs" target="_blank">
                                <img src="../detail_files/567b7d9a0001eadd01000100-100-100.jpg" alt="?" width="40" height="40">
                            </a>
                        </div><!--.user end-->
                        <div class="detail-r">
                            <span class="time"><?php echo $val['com_addtime'];?></span>
                                                     <a class="detail-name" href="http://www.imooc.com/u/1044131/bbs" target="_blank"><?php echo $val['u_name'];?></a>
                                                                                     <!--  <p class="detail-signal">我也想变好啊，也想很厉害的会画画会弹吉他，我也很努...</p>-->
                        </div>

                        
                        <div class="answer-content rich-text imgPreview"><p><?php echo $val['com_content'];?><br></p></div>

                                                <div class="ctrl-bar js-msg-context clearfix js-reply-tool hide">
                            <div class="detail-editor-btns r">
                                <span class="qa-tips"></span>
                                <button class="btn btn-normal js-reply-cancel">取消</button>
                                <button class="btn btn-red js-reply-submit" data-id="156829">保存</button>
                            </div>
                        </div>
                        
                        <div class="ctrl-bar clearfix js-wenda-tool">
                         <span class="agree-with " data-ques-id="313011" data-answer-id="156829" data-hasop=""><b>赞同</b></span>

                            <span class="oppose " data-ques-id="313011" data-answer-id="156829" data-hasop="">反对</span>

                            <span class="reply" data-replynum="0" data-reply-id="156829" data-ques-uid="2965295"><em>0</em>个回复</span>

                            
                            

                        </div><!--.ctrl-bar end-->

                        
                    </div><!--.answer-con end-->
                    <div class="reply-con">
                        <ul class="reply-list">
                            
                        </ul><!--.reply-list end-->
                        <div class="release-reply-con clearfix">
                                                                    <div class="user-pic">
                                        <a href="http://www.imooc.com/u/3116310/bbs" target="_blank">
                                            <img src="../detail_files/56f9d3ae0001e1c701000100-100-100.jpg" alt="?" width="40" height="40">
                                        </a>
                                    </div>
                                                                <!--.user-pic end-->
                            <div class="user-name">
                                                                    <a href="http://www.imooc.com/u/3116310/bbs" target="_blank">core3116310</a>
                                                            </div>
                            <div class="textarea-con">
                                                                <textarea name="release-reply" id="release-reply" placeholder="写下你的回复"></textarea>
                                                            </div>
                            <p class="err-tip"></p>
                            <div class="userCtrl clearfix">
                                <div class="verify-code"></div>
                                <div class="do-reply-btn" data-answer-id="156829" data-ques-uid="2965295">回复</div>
                            </div>
                        </div><!--.release-reply-con end-->
                    </div><!--.reply-con end-->
                    
                </div>
            
            <!-- 回答回复 end --><?php } ?>