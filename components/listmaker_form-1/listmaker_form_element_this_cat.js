
// 2016/06/28

function lmfetc_load( lmfetc_rahem, select_value ){

	// extra before
	if(typeof lmfetc_extra_before == 'function') { 
		lmfetc_extra_before( select_value );
	}

	// vars
	cat_name = lmfetc_rahem.closest('.lmfetc_container').attr('rel_cat_name');
	value_serial = lmfetc_rahem.attr('rel_value_serial');
	no_subcat = lmfetc_rahem.attr('rel_no_subcat');
	lmfetc_rahem.attr('rel_value_serial','');
	
	if( select_value ){
		parent = select_value;
		lmfetc_rahem.attr('rel_parent', parent);
	
	} else {
		parent = lmfetc_rahem.parent().attr('rel_parent');
	}


	//
	// update the `hidden` input
	lmfetc_rahem.closest('.lmfetc_container').find('> input[type="hidden"]').val( parent );

	//
	// skip if there is no subcat
	// if( no_subcat==1 ){
	// 	return true;
	// }

	if( select_value=='' ){
		lmfetc_rahem.html('');
		// lmfetc_rahem.closest('.lmfetc_container').find('> input[type="hidden"]').val( 0 );
	} else {
		$.ajax({
			method: "GET",
			url: './?do_action=listmaker_form_element_this_cat_fetchSubCat&cat_name='+cat_name+'&parent='+parent+'&value_serial='+value_serial
		
		}).done(function( html ) {
			lmfetc_rahem.html( html );
		});
	}

	// catcustomfield console
	if(typeof catcustomfield_console == 'function') { 
		catcustomfield_console( cat_name, parent /* as cat_id */ ); 
	}

	// extra after
	if(typeof lmfetc_extra_after == 'function') { 
		lmfetc_extra_after( select_value );
	}

}

jQuery(document).ready(function($) {
	
	$('.lmfetc_container').each(function( index ) {
		// console.log( index );
		lmfetc_load( $(this).find('> .lmfetc'), null );
	});
	
});



