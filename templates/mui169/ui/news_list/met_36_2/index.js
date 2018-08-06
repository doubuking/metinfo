METUI_FUN['$uicss']={
    name:'$uicss',
    init:function(){
      //点击右侧列表
      var news_panel=METUI['$uicss'].find('.header_news_panel'),
          list=news_panel.find(".nav-tabs li a");
          list.on('click',function(){
            list.removeClass('active');
            $(this).addClass('active');
            METUI['$uicss'].find('.tab-pane.fade').removeClass('in active');
            var left_list = METUI['$uicss'].find('.tab-pane.fade');
            var img_index=$(this).attr('index');
            $(left_list[img_index]).addClass('in active');
      });

    }
};
var x=new metui(METUI_FUN['$uicss']);

