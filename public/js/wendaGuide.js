// 发笔记、提问题新版引导图层
define(function(require, exports, module){
    var store = require('store');
    var callOver;

    var guideLayer = {
        getGuideTpl: function(){
            return [
                '<div class="guide-mask" id="J-guide-mask"></div>',
                '<div class="next-layer" id="J-next-layer">',
                    '<div class="btn-next-step" id="J-next-step">下一步</div>',
                    '<div class="left-data-layer"></div>',
                '</div>',
                '<div class="guide-layer" id="J-guide-layer" style="display:none;">',
                    '<div class="btn-close-guide" id="J-close-guide">关闭按钮</div>',
                '</div>'
            ].join('');
        },
        create: function(callOver){ // 生成新功能引导图层
            $(document.body).append(this.getGuideTpl());
            var that = this,
                leftDis,
                dom = this.getDom();
            

            // 设置引导层的位置
            this.setLayerPosX(dom);
            store.set('isFirstCome', 'No');

            // 关闭引导图层后，再初始化播放器
            dom.closeBtn.on('click', function(){
                $(this).off('click');
                that.close(dom);
                callOver && callOver();
            });

            dom.nextBtn.on('click',function(){
                $(this).off('click');
                that.next(dom);
            });

            $(window).on('resize', function(){
                that.setLayerPosX(dom);
            });
        },
        next: function(dom){ // 进入下一步引导图层
            dom.nextLayer.remove();
            dom.guideLayer.show();
        },
        close: function(dom){ // 关闭新功能引导图层
            dom.mask.remove();
            dom.guideLayer.remove();
        },
        setLayerPosX: function(dom){
            $(window).width()>1200?leftDis=1200:leftDis=$(window).width();

            dom.guideLayer.css({
                'top': ($(window).height() - dom.guideLayer.height())/2,
                'right': ($(window).width() - leftDis)/2
            });

            dom.nextLayer.css({
                'top': ($(window).height() - dom.nextLayer.height())/2,
                'left': ($(window).width() - leftDis)/2
            });
        },
        getDom: function(){
            return {
                mask: $('#J-guide-mask'),
                guideLayer: $('#J-guide-layer'),
                nextLayer: $('#J-next-layer'),
                closeBtn: $('#J-close-guide'),
                nextBtn: $('#J-next-step')
            };
        }
    };

    return guideLayer;
});