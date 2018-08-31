METUI_FUN['$uicss'] = {
    name:'$uicss',
    position:function(){
        var a=METUI['$uicss'].find('.col-md-3');
        var b=METUI['$uicss'].find('.pright');
        if(a.length&&b.length){
                //移动端侧边栏换位置处理
            if($(window).width()>=991){
                // a.insertBefore(b);    //移动节点
                a.find(".met-sidebar").css({
                    "margin-left":"0px",
                    "margin-right":"30px"
                })
            }
        }
    }
};
var x = new metui(METUI_FUN['$uicss']);