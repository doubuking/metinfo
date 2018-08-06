/*
应用通用功能
 */
// 判断地址栏是否有lang参数，没有则跳转到带lang参数的地址
if(MET['url']['basepath']){
    var str=window.parent.document.URL,
        s=str.indexOf("lang="+M['lang']),
        z=str.indexOf("lang");
    if (s=='-1' && z!='-1') {
        var s1=str.indexOf('#');
        if (s1=='-1') {
            str=str.replace(/(lang=[^#]*)/g, "lang="+M['lang']+"#");
        }
        str=str.replace(/(lang=[^#]*#)/g, "lang="+lang+"#");
        parent.location.href=str;
    }
}
// 获取地址栏参数
function getQueryString(name) {
    var reg=new RegExp("(^|&)"+name+"=([^&]*)(&|$)", "i");
    var r=window.location.search.substr(1).match(reg);
    if (r!=null) return unescape(decodeURIComponent(r[2]));
    return null;
}
// 可视化弹框中页面隐藏头部
if (parent.window.location.search.indexOf('pageset=1') >= 0) $('.metadmin-head').hide();
// 操作成功、失败提示信息
if(top.location!=location) $("html",parent.document).find('.turnovertext').remove();
// 弹出提示信息
function metAlert(text,delay,bg_ok,type){
    delay=typeof delay != 'undefined'?delay:2000;
    bg_ok=bg_ok?'bgshow':'';
    if(text!=' '){
        text=text||METLANG.jsok;
        text='<div>'+text+'</div>';
        if(parseInt(type)==0) text+='<button type="button" class="close white" data-dismiss="alert"><span aria-hidden="true">×</span></button>';
        if(!$('.metalert-wrapper').length) $('body').append('<div class="metalert-wrapper w-full alert '+bg_ok+'"><div class="metalert-text p-x-40 p-y-10 bg-purple-600 white font-size-16">'+text+'</div></div>');
        var $met_alert=$('.metalert-text');
        $met_alert.html(text);
        $('.metalert-wrapper').show();
        if($met_alert.height()%2) $met_alert.height($met_alert.height()+1);
    }
    if(delay){
        setTimeout(function(){
            $('.metalert-wrapper').fadeOut();
        },delay);
    }
}
// 弹出页面返回的提示信息
var turnover=[];
turnover['text']=getQueryString('turnovertext');
turnover['type']=parseInt(getQueryString('turnovertype'));
turnover['delay']=turnover['type']?undefined:0;
if(turnover['text']) metAlert(turnover['text'],turnover['delay'],!turnover['type'],turnover['type']);
// 系统参数
var lang=M['lang'],
    siteurl=M['weburl'],
    basepath=MET['url']['basepath']?MET['url']['basepath']:'';
if(typeof MET != 'undefined'){
    for(var name in MET){
        if(!M[name]) M[name]=MET[name];
    }
}
M['n']=getQueryString('n'),
M['c']=getQueryString('c'),
M['a']=getQueryString('a');
if(!M['url']) M['url']=[];
M['url']['system']=M['weburl']+'app/system/';
M['url']['static']=M['url']['system']+'include/static/';
M['url']['static_vendor']=M['url']['static']+'vendor/';
M['url']['static2']=M['url']['system']+'include/static2/';
M['url']['static2_vendor']=M['url']['static2']+'vendor/';
M['url']['static2_plugin']=M['url']['static2']+'js/Plugin/';
M['url']['uiv2']=M['weburl']+'public/ui/v2/';
M['url']['uiv2_css']=M['url']['uiv2']+'static/css/';
M['url']['uiv2_js']=M['url']['uiv2']+'static/js/';
M['url']['uiv2_plugin']=M['url']['uiv2']+'static/plugin/';
M['url']['app']=M['weburl']+'app/app/';
M['url']['pub']=M['weburl']+'app/system/include/public/';
M['url']['epl']=M['url']['pub']+'js/examples/';
M['url']['editor']=M['url']['app']+MET['met_editor']+'/';
// 插件路径
M['plugin']=[];
M['plugin']['formvalidation']=[
    M['url']['static2_vendor']+'formvalidation/formValidation.min.css',
    M['url']['static2_vendor']+'formvalidation/formValidation.min.js',
    M['url']['static2_vendor']+'formvalidation/language/zh_CN.js',
    M['url']['static2_vendor']+'formvalidation/framework/bootstrap4.min.js',
    M['url']['static2_vendor']+'jquery-enplaceholder/jquery.enplaceholder.min.js',
    M['url']['uiv2_js']+'form.js'
];
M['plugin']['datatables']=[
    M['url']['static2_vendor']+'datatables-bootstrap/dataTables.bootstrap.min.css',
    M['url']['static2_vendor']+'datatables-responsive/dataTables.responsive.min.css',
    M['url']['static2_vendor']+'datatables/jquery.dataTables.min.js',
    M['url']['static2_vendor']+'datatables-bootstrap/dataTables.bootstrap.min.js',
    M['url']['static2_vendor']+'datatables-responsive/dataTables.responsive.min.js',
    M['url']['uiv2_js']+'datatable.js'
];
M['plugin']['ueditor']=[
    M['weburl']+'app/app/ueditor/ueditor.config.js',
    M['weburl']+'app/app/ueditor/ueditor.all.min.js'
];
M['plugin']['minicolors']=[
    M['url']['epl']+'color/jquery.minicolors.css',
    M['url']['epl']+'color/jquery.minicolors.min.js'
];
M['plugin']['tokenfield']=[
    M['url']['static2_vendor']+'bootstrap-tokenfield/bootstrap-tokenfield.min.css',
    M['url']['static2_vendor']+'bootstrap-tokenfield/bootstrap-tokenfield.min.js',
    M['url']['static2_plugin']+'bootstrap-tokenfield.min.js'
];
M['plugin']['ionrangeslider']=[
    M['url']['static2_vendor']+'ionrangeslider/ionrangeslider.min.css',
    M['url']['static2_vendor']+'ionrangeslider/ion.rangeSlider.min.js'
];
M['plugin']['datetimepicker']=[
    M['url']['epl']+'time/jquery.datetimepicker.css',
    M['url']['epl']+'time/jquery.datetimepicker.js'
];
M['plugin']['select-linkage']=M['url']['static_vendor']+'select-linkage/jquery.cityselect.js';
M['plugin']['alertify']=[
    M['url']['static2_vendor']+'alertify/alertify.min.css',
    M['url']['static2_vendor']+'alertify/alertify.js',
    M['url']['static2_plugin']+'alertify.min.js'
];
M['plugin']['selectable']=[
    M['url']['static2_plugin']+'asselectable.min.js',
    M['url']['static2_plugin']+'selectable.min.js'
];
M['plugin']['fileinput']=M['url']['static2_vendor']+'fileinput/fileinput.min.js';
M['plugin']['lazyload']=M['weburl']+'public/ui/v2/static/plugin/jquery.lazyload.min.js';
M['plugin']['hover-dropdown']=M['url']['static_vendor']+'bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js';
M['plugin']['asscrollable']=[
    M['url']['static2_vendor']+'asscrollable/asScrollable.min.css',
    M['url']['static2_vendor']+'asscrollbar/jquery-asScrollbar.min.js',
    M['url']['static2_vendor']+'asscrollable/jquery-asScrollable.min.js',
    M['url']['static2_plugin']+'asscrollable.min.js'
]
M['plugin']['touchspin']=[
    M['url']['static2_vendor']+'bootstrap-touchspin/bootstrap-touchspin.min.css',
    M['url']['static2_vendor']+'bootstrap-touchspin/bootstrap-touchspin.min.js'
]
M['plugin']['masonry']=M['url']['static2_vendor']+'masonry/masonry.pkgd.min.js';
M['plugin']['appear']=[
    M['url']['static2_vendor']+'jquery-appear/jquery.appear.min.js',
    M['url']['static2_plugin']+'jquery-appear.min.js'
];
M['plugin']['ladda']=[
    M['url']['static2_vendor']+'ladda/ladda.min.css',
    M['url']['static2_vendor']+'ladda/spin.min.js',
    M['url']['static2_vendor']+'ladda/ladda.min.js',
    M['url']['static2_plugin']+'ladda.min.js'
];
M['plugin']['webui-popover']=[
    M['url']['static2_vendor']+'webui-popover/webui-popover.min.css',
    M['url']['static2_vendor']+'webui-popover/jquery.webui-popover.min.js'
];
// 表单验证
if($('form').length && typeof validate =='undefined') $.include(M['plugin']['formvalidation']);
// ajax表格
if($('.dataTable').length && typeof datatableOption =='undefined') $.include(M['plugin']['datatables']);
// 系统功能
$.fn.extend({
    // 编辑器
    metEditor:function(){
        if(!$(this).length) return;
        if(M['met_editor']=='ueditor'){// 百度编辑器
            if(typeof textarea_editor_val =='undefined') window.textarea_editor_val=[];
            var $self=$(this);
            $.include(M['plugin']['ueditor'],function(){
                $self.each(function(index, val) {
                    var index1=$(this).index('textarea[data-plugin="editor"]');
                    if(!$(this).attr('id')) $(this).attr({id:'textarea-editor'+index1});
                    textarea_editor_val[index1]=UE.getEditor(val.id,{
                        scaleEnabled:true, // 是否可以拉伸长高,默认false(当开启时，自动长高失效)
                        autoFloatEnabled:false, // 是否保持toolbar的位置不动，默认true
                        initialFrameWidth : $(this).data('editor-x')||'100%',
                        initialFrameHeight : $(this).data('editor-y')||400,
                    });
                });
            });
        }else if(M['met_editor']=='editormd'){// markdown编辑器

        }
    },
    // 颜色选择器
    metDatetimepicker:function(){
        if(!$(this).length) return;
        $(this).each(function(index, el) {
            var $self=$(this);
            $(this).datetimepicker({
                lang:M['lang']=='cn'?'ch':'en',
                timepicker:$self.attr("data-day-type")==2?true:false,
                format:$self.attr("data-day-type")==2?'Y-m-d H:i:s':'Y-m-d'
            });
        });
    },
    // 联动菜单
    metCitySelect:function(){
        if(!$(this).length) return;
        if(typeof citySelect =='undefined') window.citySelect=[];
        $(this).each(function(index){
            var country=$(this).find(".country").attr("data-checked"),
                p=$(this).find(".prov").attr("data-checked"),
                c=$(this).find(".city").attr("data-checked"),
                s=$(this).find(".dist").attr("data-checked"),
                url=$(this).attr('data-select-url')?$(this).attr('data-select-url'):M['url']['static2_vendor']+'select-linkage/citydata.min.json',
                option={url:url,prov:p, city:c, dist:s, nodata:'none'};
            if($(this).hasClass('shop-address-select')){
                option={
                    url:url,country:country, prov:p, city:c, dist:s, nodata:'none',
                    required:false,
                    country_name_key:'name',
                    p_name_key:'name',
                    n_name_key:'name',
                    s_name_key:'name',
                    p_children_key:'children',
                    n_children_key:'children',
                    value_key:'id',
                    getCityjson:function(json,key){
                        key=key||0;
                        return json[key]['children'];
                    }
                };
            }
            citySelect[index]=$(this).citySelect(option);
        });
    },
    // 上传文件
    metFileInput:function(){
        if(!$(this).length) return;
        $(this).each(function(index, el) {
            var url=$(this).data('url')||M['url']['system']+'entrance.php?lang='+M['lang']+'&c=uploadify&m=include&a=doupfile&type=1',
                multiple=$(this).attr('multiple'),
                $form_group=$(this).parents('.form-group');
            $(this).removeAttr('hidden').fileinput({// fileinput插件
                language:'zh',             // 语言文字
                showCaption:false,         // 输入框
                showRemove:false,          // 删除按钮
                browseLabel:'',            // 按钮文字
                showUpload:false,          // 上传按钮
                uploadUrl: url,            // 处理上传
                uploadAsync:multiple       // 异步批量上传
            }).on("filebatchselected", function(event, files) {
                $(this).fileinput("upload");
            }).on('fileuploaded', function(event, data, previewId, index) {
                var $text=$(this).parents('.input-group-file').find('input[type="text"]'),
                    path='';
                if(multiple){
                    path=$text.val()?$text.val()+','+data.response.path:data.response.path;
                }else{
                    path=data.response.path;
                }
                $text.val(path);// 输入框文件路径更新
                // 显示上传成功文字
                $form_group.removeClass('has-danger').addClass('has-success');
                if(!$form_group.find('small.form-control-label').length) $form_group.append('<small class="form-control-label"></small>');
                var tips=M['langtxt'].jsx17||M['langtxt'].fileOK;
                $form_group.find('small.form-control-label').text(tips);
            }).on('filebatchuploaderror', function(event, data, previewId, index) {
                // 显示报错文字
                $form_group.removeClass('has-success').addClass('has-danger');
                if(!$form_group.find('small.form-control-label').length) $form_group.append('<small class="form-control-label"></small>');
                $form_group.find('small.form-control-label').text(data.response.error);
            });
            $(this).siblings('i').attr({class:'icon wb-upload'}).parents('.btn-file').insertAfter($(this).parents('.file-input'));
        });
    },
    // 单选、多选默认选中
    metRadioCheckboxChecked:function(){
        if(!$(this).length) return;
        $(this).each(function(index, el) {
            var checked=String($(this).data('checked'));
            if(checked!=''){
               checked=checked.indexOf('#@met@#')>=0?checked.split('#@met@#'):[checked];
                var name=$(this).attr('name');
                for (var i=0; i < checked.length; i++) {
                    $('input[name="'+name+'"][value="'+checked[i]+'"]').attr('checked', true);
                }
            }
        });
    },
    // 下拉菜单默认选中
    metSelectChecked:function(){
        if(!$(this).length) return;
        $(this).each(function(index, el) {
            $('option[value='+$(this).data('checked')+']',this).attr({selected:true});
        });
    },
    // 图片延迟加载
    metlazyLoad:function(){
        if(!$(this).length) return;
        var $self=$(this);
        if(typeof $.fn.lazyload == 'undefined'){
            $.include(M['plugin']['lazyload'],function(){
                $self.lazyload({placeholder:M['lazyloadbg']});
            })
        }else if($('script[src*="js/basic_admin.js"]').length){
            $self.lazyload({placeholder:M['lazyloadbg']});
        }else{
            if(typeof M['lazyload_load_num'] =='undefined') M['lazyload_load_num']=0;
            var delay=M['lazyload_load_num']?0:500;
            if(delay){
                setTimeout(function(){
                    var is_lazyload=true;
                    $self.each(function(index, el) {
                        if($(this).attr('data-lazyload')=='true'){
                            is_lazyload=false;
                            return false;
                        }
                    });
                    if(is_lazyload) $self.lazyload({placeholder:M['lazyloadbg']});
                    M['lazyload_load_num']++;
                },delay);
            }else{
                $self.lazyload({placeholder:M['lazyloadbg']});
            }
        }
    },
    // 通用功能开启
    metCommon:function(){
        var dom=this;
        // 编辑器
        if($('textarea[data-plugin="editor"]',dom).length) $('textarea[data-plugin="editor"]',dom).metEditor();
        // 颜色选择器
        if($('input[data-plugin="minicolors"]',dom).length) $.include(M['plugin']['minicolors'],function(){
            $('input[data-plugin="minicolors"]',dom).minicolors();
        });
        // 标签
        if($('input[data-plugin="tokenfield"]',dom).length) $.include(M['plugin']['tokenfield'],'','siterun');
        // 滑块
        if($('input[type="text"][data-plugin="ionRangeSlider"]',dom).length) $.include(M['plugin']['ionrangeslider']);
        // 日期选择器
        if($('input[data-plugin="datetimepicker"]',dom).length) $.include(M['plugin']['datetimepicker'],function(){
            $('input[data-plugin="datetimepicker"]',dom).metDatetimepicker();
        });
        // 联动菜单
        if($('[data-plugin="select-linkage"]',dom).length) $.include(M['plugin']['select-linkage'],function(){
            $('[data-plugin="select-linkage"]',dom).metCitySelect();
        });
        // 模态对话框
        if($('[data-plugin="alertify"]',dom).length) $.include(M['plugin']['alertify'],'','siterun');
        // 全选、全不选
        if($('[data-plugin="selectable"]',dom).length) $.include(M['plugin']['selectable'],'','siterun');
        // 上传文件
        if($('input[type="file"][data-plugin="fileinput"]',dom).length) $.include(M['plugin']['fileinput'],function(){
            $('input[type="file"][data-plugin="fileinput"]',dom).metFileInput();
        })
        // 滚动条
        if($('[data-plugin="scrollable"]',dom).length) $.include(M['plugin']['asscrollable'],'','siterun');
        // 单选、多选默认选中
        if($('input[data-checked]',dom).length) $('input[data-checked]',dom).metRadioCheckboxChecked();
        // 下拉菜单默认选中
        if($('select[data-checked]',dom).length) $('select[data-checked]',dom).metSelectChecked();
        // 数量改变
        if($('[data-plugin="touchSpin"]',dom).length && typeof $.fn.TouchSpin =='undefined') $.include(M['plugin']['touchspin'],function(){
            $('[data-plugin="touchSpin"]',dom).TouchSpin();
        });
        // 图片延迟加载
        if($('[data-original]',dom).length) $('[data-original]',dom).metlazyLoad();
    }
});
// 通用功能开启
$(document).metCommon();
if($('.met-sidebar-nav-active-name').length) $('.met-sidebar-nav-active-name').html($('.met-sidebar-nav-mobile .dropdown-menu .dropdown-item.active').text());
// 勾选开关
$(document).on('change', 'input[type="checkbox"][data-plugin="switchery"]', function(event) {
    var val=$(this).is(':checked')?1:0;
    $(this).val(val);
});
// 非前台模板页面-兼容老模板
if(M['url']['basepath'] || $('script[src*="js/basic_web.js"]').length){
    // 返回顶部
    $(".met-scroll-top").click(function(){
        $('html,body').animate({scrollTop:0},300);
    });
    // 返回顶部按钮显示/隐藏
    var wh=$(window).height();
    $(window).scroll(function(){
        if($(this).scrollTop()>wh){
            $(".met-scroll-top").removeAttr('hidden').addClass("animation-slide-bottom");
        }else{
            $(".met-scroll-top").attr({hidden:''}).removeClass('animation-slide-bottom');
        }
    });
}
$(function(){
    // 表单功能
    // 添加项
    $(document).on('click', '[table-addlist]', function(event) {
        var $table=$(this).parents('table').length?$(this).parents('table'):$($(this).data('table-id')),
            html=$table.find('[table-addlist-data]').val();
        $table.find('tbody').append(html);
        var $new_tr=$table.find('tbody tr:last-child');
        if(!$new_tr.find('[table-cancel]').length && $table.find('[table-del-url]').length) $new_tr.find('td:last-child').append('<button type="button" class="btn btn-default btn-outline m-l-5" table-cancel>撤销</button>');
    });
    // 撤销项
    $(document).on('click', '[table-cancel]', function(event) {
        $(this).parents('tr').remove();
    })
    // 删除项
    $(document).on('click', '[table-del]', function(event) {
        var $self=$(this),
            remove=function(){
                alertify.theme('bootstrap').okBtn(METLANG.confirm).cancelBtn(METLANG.jslang2).confirm(METLANG.delete_information, function (ev) {
                    $self.parents('tr').remove();
                })
            };
        if(typeof alertify =='undefined'){
            $.include(M['plugin']['alertify'],function(){
                remove();
            });
        }else{
            remove();
        }
    })
    // 删除多项
    $(document).on('click', '[table-del-url]', function(event) {
        var $checkbox=$(this).parents('table').find('tbody input[type="checkbox"][id*="row-id-"]:checked'),
            del_data={id:[]};
        $checkbox.each(function(index, el) {
            del_data['id'].push($(this).parents('tr').find('[name="id"]').val());
        })
        $.ajax({
            url: $(this).data('table-del-url'),
            type: "POST",
            dataType:'json',
            data:{del_data:del_data},
            success: function(result){
                console.log(result);
            }
        });
    })
});