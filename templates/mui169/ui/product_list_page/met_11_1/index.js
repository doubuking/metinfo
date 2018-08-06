// 瀑布流配置
METUI_FUN['$uicss'] = {
    name:'$uicss',
    metAnimOnScroll: function() {
        var list=METUI['$uicss'].find('.$uicss-list');
        // 产品列表页
        if(list.length){
            if($('#met-grid').length){
                setTimeout(function(){
                    metAnimOnScroll('met-grid');
                },0)
            }
        }
        function metAnimOnScroll(obj){
            new AnimOnScroll( document.getElementById(obj),{
                minDuration:0.4,
                maxDuration:0.7,
                viewportFactor:0.2
            });
        }
    }
};
METUI['$uicss'] = new metui(METUI_FUN['$uicss']);