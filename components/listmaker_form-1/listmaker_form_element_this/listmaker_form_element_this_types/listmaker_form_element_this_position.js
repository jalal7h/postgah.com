
// 2016/06/28

function lmfetp( parent, le_paluet, hidden_input_id, value_serial ) {

	// extra before
	if(typeof lmfetp_extra_before == 'function') { 
		lmfetp_extra_before( parent );
	}

	cl( parent +' / '+ le_paluet +' / '+ hidden_input_id +' / '+ value_serial );

	// 
	// update the main hidden input
	$( '#'+hidden_input_id ).val( parent );
	
	//
	// request for next level
	urlpath = './';
	pars = 'do_action=listmaker_form_element_this_position_getChild&parent='+parent+'&hidden_input_id='+hidden_input_id;

	if( value_serial!='' ){
		pars = pars+'&value_serial='+value_serial;
	}

	wget( urlpath, le_paluet, pars );

	// extra after
	if(typeof lmfetp_extra_after == 'function') { 
		lmfetp_extra_after( parent );
	}

}

