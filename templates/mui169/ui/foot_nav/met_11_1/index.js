METUI_FUN['$uicss'] = {
    name:'$uicss',
    weixin: function() {
        var wx=METUI['$uicss'].find('#met-weixin');
        if(wx.length){
        Breakpoints.on('xs',{
            enter:function(){
                if(wx.offset().left < 80) wx.attr({'data-placement':'right'});
                if($(window).width()-wx.offset().left-wx.outerWidth() < 80) wx.attr({'data-placement':'left'});
            }
        })
        if(wx.data('trigger')=='click'){
            wx.mouseup(function(){
                $(this).click();
            });
        }

        }

    },
    footnav:function(){
        var m=METUI['$uicss'].find('.masonry-item');
        Breakpoints.get('xs').on({
            enter:function(){
                m.masonry({itemSelector:".masonry-item"});
            }
        });
    }
};
var x = new metui(METUI_FUN['$uicss']);