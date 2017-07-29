
// agent e faal shodan e ye position.
// tanzim mishe k age value dasht, move beshe zire form e search
function lmfetpb_EFN_formd41d8c_q_pos( position_value ){
jQuery(document).ready(function($) {
	
	pos_name = 	$('#lmfe_inDiv_formd41d8c_q_pos .lmfe_positionbox').html();
	$('#lmfe_inDiv_formd41d8c_q_pos .lmfe_positionbox').html(' ');
	
	$('.pgSearch_form shelf pos').html( pos_name );
	$('.pgSearch_form shelf pos').addClass('visi');

});
}

// dokme remove
jQuery(document).ready(function($) {
	$('.pgSearch_form shelf pos').on('click', function(){
		$('#lmfe_inDiv_formd41d8c_q_pos input[type="hidden"][name="q_pos"]').val(0);
		$('#lmfe_inDiv_formd41d8c_q_pos .lmfe_positionbox').html('همه شهرها');
		$('.pgSearch_form shelf pos').removeClass('visi');
	});
});

