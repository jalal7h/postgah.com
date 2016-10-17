
/*2016/10/17*/

function catcustomfield_console( cat_name, cat_id ){
jQuery(document).ready(function($) {
	
	cl( cat_name + ' ;; ' + cat_id );

	$('.lmfe_inDiv.ccfc').hide();
	$('#ccfc_'+cat_name+'_c').show();

	item_info = $('#ccfc_'+cat_name).attr('item_info');
	
	$('#ccfc_'+cat_name).html('');

	var pars = 'do_action=catcustomfield_formload&cat_name='+cat_name+'&cat_id='+cat_id+'&item_info='+item_info;
	$.ajax({ type:'GET', url:'./', data:pars, cache: false, 
		success: function( html ){
			$('#ccfc_'+cat_name).html( html );
		}
	});
	
});
}

