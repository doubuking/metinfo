// 瀑布流配置
METUI_FUN['$uicss'] = {
    name:'$uicss',
    metAnimOnScroll: function() {
        var list=METUI['$uicss'].find('.met-product-list');
        // 产品列表页
        if(list.length){
            // 图片懒加载
            var $metpro_original=METUI['$uicss'].find(".met-product-list [data-original]");
            if($metpro_original.length){
                var $pro_fluid=METUI['$uicss'].find(".met-product-list .container-fluid");
                if($pro_fluid.length){
                    $pro_fluid.each(function(){
                        var $self=$(this);
                        $(this).width($(this).width());
                        setTimeout(function(){
                            $self.width('');
                        },2000)
                    });
                }
                if($('#met-grid').length){
                    setTimeout(function(){
                        metAnimOnScroll('met-grid');
                    },0)
                }
            }
        }
        function metAnimOnScroll(obj){
            console.log(document.getElementById(obj));
            new AnimOnScroll( document.getElementById(obj),{
                minDuration:0.4,
                maxDuration:0.7,
                viewportFactor:0.2
            });
        }
    }
};
METUI['$uicss'] = new metui(METUI_FUN['$uicss']);