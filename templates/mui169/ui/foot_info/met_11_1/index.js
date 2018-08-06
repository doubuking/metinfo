METUI_FUN['$uicss'] = {
    name: '$uicss',
    cntotc: function() {
        //简体繁体互换
        var b = $('.$uicss .btn-cntotc');
        b.on('click', function(event) {
            var lang = $(this).attr('data-tolang');
            if (lang == 'tc') {
                $('body').s2t();
                $(this).attr('data-tolang', 'cn');
                $(this).text('简体');
            } else if (lang == 'cn') {
                $('body').t2s();
                $(this).attr('data-tolang', 'tc');
                $(this).text('繁體');
            }
        });
    }
};
var foot_info = new metui(METUI_FUN['$uicss']);