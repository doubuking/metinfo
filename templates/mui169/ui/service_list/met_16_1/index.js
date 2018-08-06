METUI_FUN['$uicss'] = {
    name:'$uicss',
    appear:function (){
        // 首页首屏内动画预加载
        var indexappear=$('.met-index-body:eq(0) [data-plugin=appear]');
        if(indexappear.length){
            indexappear.scrollFun(function(val){
                val.appearDiy();
            });
        }
    }
};
var x = new metui(METUI_FUN['$uicss']);
