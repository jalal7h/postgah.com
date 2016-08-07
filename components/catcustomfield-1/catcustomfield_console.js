
function catcustomfield_console( cat_name, cat_id ){
jQuery(document).ready(function($) {
	
	$('.lmfe_inDiv.ccfc').hide();
	$('#ccfc_'+cat_name+'_c').show();

	item_info = $('#ccfc_'+cat_name).attr('item_info');

	wget( './', 'ccfc_'+cat_name , 'do_action=catcustomfield_formload&cat_name='+cat_name+'&cat_id='+cat_id+'&item_info='+item_info );

});
}

