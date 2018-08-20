METUI_FUN['$uicss']={
	name:'$uicss',
	init:function(){
     $(".$uicss .carousel").carousel({
     	interval: 10000
     });
     $(".$uicss .carousel-control-next").click(function(){
     $(".$uicss .carousel").carousel('next');
      });
     $(".$uicss .carousel-control-prev").click(function(){
      	$(".$uicss .carousel").carousel('prev');
     });
     //样式循环
     
	}
};
var x=new metui(METUI_FUN['$uicss']);

