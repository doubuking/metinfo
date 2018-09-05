$(".navbar-nav .nav-item").click(function(){

    //通过 .index()方法获取元素下标，从0开始，赋值给某个变量
    var _index = $(this).index();
    //让内容框的第 _index 个显示出来，其他的被隐藏
    $(".tab-box>.met-editor").eq(_index).show().siblings().hide();
    //改变选中时候的选项框的样式，移除其他几个选项的样式
    $(this).children("a").addClass("active").parent(".nav-item").siblings().children("a").removeClass("active");


    nav_w=$(this).width();

    var fn_w = ($(".find_nav").width() - nav_w) / 2;
    var fnl_l;
    var fnl_x = parseInt($(this).position().left);
    if (fnl_x <= fn_w) {
        fnl_l = 0;
    } else if (fn_w - fnl_x <= flb_w - fl_w) {
        fnl_l = flb_w - fl_w;
    } else {
        fnl_l = fn_w - fnl_x;
    }
    $(".find_nav_list").animate({
        "left" : fnl_l
    }, 300);

});


$(".find_nav_left").css("left",0);

var fl_w =$(".find_nav_list").width();
var flb_w=$(".find_nav_left").width();
$(".find_nav_list").on('touchstart', function (e) {
    console.log('touchstart');
    var touch1 = e.originalEvent.targetTouches[0];
    x1 = touch1.pageX;
    y1 = touch1.pageY;
    ty_left = parseInt($(this).css("left"));
    console.log(x1);
    console.log(y1);
    console.log(ty_left);
});
$(".find_nav_list").on('touchmove', function (e) {
    console.log('touchmove');
    var touch2 = e.originalEvent.targetTouches[0];
    var x2 = touch2.pageX;
    var y2 = touch2.pageY;
    if(ty_left + x2 - x1>=0){
        $(this).css("left", 0);
    }else if(ty_left + x2 - x1<=flb_w-fl_w){
        $(this).css("left", flb_w-fl_w);
    }else{
        $(this).css("left", ty_left + x2 - x1);
    }
    if(Math.abs(y2-y1)>0){
        e.preventDefault();
    }
});



