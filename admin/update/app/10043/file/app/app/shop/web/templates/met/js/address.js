// 收货地址模态框
function addrModal(dom){
	$('.addr-edit-form [name],.addr-edit-form [data-name]').val('');
	$('.addr-edit-form .select-linkage select:eq(0)').val($('.addr-edit-form .select-linkage select:eq(0) option:eq(0)').val()).change();
	if(dom){
		var zone_code=dom.data('zone_code');
		zone_code=zone_code.indexOf(',')>=0?zone_code.split(','):[zone_code];
		$('.addr-edit-form input[name="id"]').val(dom.data('id'));
		$('.addr-edit-form input[name="name"]').val(dom.data('name'));
		$('.addr-edit-form input[name="tel"]').val(dom.data('tel'));
		$('.addr-edit-form select[data-name="zone_coun"]').val(zone_code[0]).change();
		$('.addr-edit-form select[data-name="zone_p"]').val(zone_code[1]).change();
		$('.addr-edit-form select[data-name="zone_c"]').val(zone_code[2]).change();
		$('.addr-edit-form select[data-name="zone_d"]').val(zone_code[3]).change();
		$('.addr-edit-form textarea[name="zone_a"]').val(dom.data('zone_a'));
	}
	if(M['is_lteie9']) $('.addr-edit-form [name]:not([type=hidden])').trigger('input');// IE9占位文字触发兼容
	$('#addr-edit-modal').modal();
}
// 地址数据
function loadAddrJson(func){
	$.ajax({
		url: addrlisturl,
		type: 'POST',
		dataType:'json',
		success: function(json) {
			func(json);
		}
	});
}