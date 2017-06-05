
/*2017/06/05*/

function catcustomfield_console( cat_name, cat_id ){
jQuery(document).ready(function($) {
	
	cl( 'catcustomfield_console :: ' + cat_name + ' ;; ' + cat_id );

	$('.lmfe_inDiv.ccfc').hide();
	$('#ccfc_'+cat_name+'_c').show();

	item_info = $('#ccfc_'+cat_name).attr('item_info');
	
	$('#ccfc_'+cat_name).html('');

	var pars = 'do_action=catcustomfield_formload&cat_name='+cat_name+'&cat_id='+cat_id+'&item_info='+item_info;
	cl( 'ajax request sent : ' + pars );

	$.ajax({ type:'GET', url: _URL , data:pars, cache: false, 
		success: function( html ){
			cl('ajax done, success');
			$('#ccfc_'+cat_name).html( html );
		}
	});
	
});
}

