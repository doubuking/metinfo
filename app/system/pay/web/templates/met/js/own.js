/*
支付页面
 */
var weixinvld;
$.include(M['plugin']['alertify']);
$(function(){
    if($('#pay-balance').length){
        setTimeout(function(){
            validate[0].success(function(result,form){
                if(result.error){
                    alertify.error(result.error);
                }else if(result.success){
                    alertify.success(result.code);
                    location.href = result.success;
                }
            });
        },1000)
    }

    $(document).on('click', '.pay-online-recharge', function() {
        var price = $("input[name='price']").val();
        if(price){
            var self = $(this);
            self.attr('href', 'javascript:;');
            $.ajax({
                url: self.data('url'),
                data:{price:price},
                type: 'POST',
                dataType:'json',
                success: function(data) {
                    alertify.success(data.success);
                    if(data.error){
                        //alert(data.error);
                    }else if(data.success){
                        self.attr('href', data.success);
                    }
                }
            });
        }else{
            alertify.error(METLANG.pay_precmoney);
        }
    });

    $(document).on('click', '.payment-weixin', function(e) {
        e.preventDefault();
        if($(this).attr('href') != 'javascript:;'){
            $("#payment-weixin-modal .modal-body").html('<div class="h-100 vertical-align text-xs-center order-loader"><div class="loader vertical-align-middle loader-default"></div></div>');
            $("#payment-weixin-modal").modal('show');
            var url = $(this).data('check_url');
            $.ajax({
                url: $(this).attr('href'),
                type: 'POST',
                dataType:'json',
                success: function(data) {
                    if(data.code_url){
                        $("#payment-weixin-modal .modal-body").html('<img src="'+data.code_url+'&size=8" class="img-responsive">');
                        var weixinvld = setInterval(function () { weixinvid(url); },3000);
                        //setInterval(function(){console.log('OK')},1000);
                        setTimeout(function(){clearInterval(weixinvld)},600000);
                    }else{
                        alertify.error(METLANG.pay_payinterface_error);
                        $("#payment-weixin-modal").modal('hide');
                    }
                }
            });
        }
    });
    /*
    $('#payment-weixin-modal').on('hidden.bs.modal', function (e) {
        window.clearInterval(weixinvld);
    })
    */
    $(document).on('click', '.payment-weixin-h5', function(e) {
        e.preventDefault();
        if($(this).attr('href') != 'javascript:;'){
            //$("#payment-weixin-h5-modal .modal-body").html();
            $("#payment-weixin-h5-modal").modal('show');
            var url = $(this).data('check_url');

            weixinvld = setInterval(function () { weixinvid(url); },3000);
            $.ajax({
                url: $(this).attr('href'),
                type: 'GET',
                dataType:'json',
                success: function(data) {
                    $("#payment-weixin-h5-modal").modal('hide');
                    if(data.Address&&data.Parameters){
                        window.wxh5Address = jQuery.parseJSON(data.Address);
                        window.wxh5Parameters = jQuery.parseJSON(data.Parameters);

                        //取消微信共享收货地址
                        /*if (typeof WeixinJSBridge == "undefined") {
                            if (document.addEventListener) {
                                document.addEventListener('WeixinJSBridgeReady', editAddress, false)
                            } else if (document.attachEvent) {
                                document.attachEvent('WeixinJSBridgeReady', editAddress);
                                document.attachEvent('onWeixinJSBridgeReady', editAddress)
                            }
                        } else {
                            editAddress()
                        }*/
                        callpay();
                    }else{
                        alertify.error(METLANG.pay_payinterface_error);
                    }
                }
            });
        }
    });

    $(document).on('click', '.payment-weixin-web-h5', function(e) {
        if($(this).attr('href') != 'javascript:;'){
            var url = $(this).data('check_url');
            var weixinvld = setInterval(function () { weixinvid(url); },3000);
            setTimeout(function(){clearInterval(weixinvld)},600000);
        }
    });


   /* refreshInterface();

    window.setInterval("refreshInterface()",1000*60*5);*/

});
/*vid*/
function weixinvid(url){
    console.log(url);
    $.ajax({
        url: url,
        type: 'POST',
        dataType:'json',
        success: function(data) {
            if(data.trade_state=='SUCCESS'){
                alertify.success(METLANG.pay_paidok);
                location = paidokurl;
            }
        }
    });
}
/*微信应用内支付*/
function jsApiCall() {
    WeixinJSBridge.invoke('getBrandWCPayRequest', window.wxh5Parameters, function(res) {
        //WeixinJSBridge.log(res.err_msg);
        //alert(res.err_code + res.err_desc + res.err_msg);
        if(res.err_msg == "get_brand_wcpay_request：ok" ) {

        }
        $("#payment-weixin-h5-modal").modal('hide');
    })
}
function callpay() {
    if (typeof WeixinJSBridge == "undefined") {
        if (document.addEventListener) {
            document.addEventListener('WeixinJSBridgeReady', jsApiCall, false)
        } else if (document.attachEvent) {
            document.attachEvent('WeixinJSBridgeReady', jsApiCall);
            document.attachEvent('onWeixinJSBridgeReady', jsApiCall)
        }
    } else {
        jsApiCall()
    }
}
//获取共享地址
function editAddress() {
    WeixinJSBridge.invoke('editAddress', window.wxh5Address, function(res) {
        var value1 = res.proviceFirstStageName;
        var value2 = res.addressCitySecondStageName;
        var value3 = res.addressCountiesThirdStageName;
        var value4 = res.addressDetailInfo;
        var tel = res.telNumber;
        //alert(value1 + value2 + value3 + value4 + ":" + tel)
    })
}

/*
function refreshInterface(){
    $(".pay-online").each(function(){
        var self = $(this);
        console.log(self.attr('data-url'));
        $.ajax({
            url: self.attr('data-url'),
            type: 'POST',
            dataType:'json',
            success: function(data) {
                if(data.error){
                    //alert(data.error);
                }else if(data.success){
                    //self.attr('href', data.success);
                }
            }
        });
    });
}*/

//支付完成跳转
$(function(){
    var $url = $("#callback").attr('href');
    function jump(){
        window.location = $url;
    }
    if($url){
        setTimeout(jump, 3000);
    }
})