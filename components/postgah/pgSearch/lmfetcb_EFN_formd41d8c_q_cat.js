
// agent e faal shodan e ye cat.
// tanzim mishe k age value dasht, move beshe zire form e search
function lmfetcb_EFN_formd41d8c_q_cat( cat_value ){
jQuery(document).ready(function($) {
	
	cat_name = 	$('#lmfe_inDiv_formd41d8c_q_cat .lmfe_catbox').html();
	$('#lmfe_inDiv_formd41d8c_q_cat .lmfe_catbox').html('&nbsp;');
	
	$('.pgSearch_form shelf cat').html( cat_name );
	$('.pgSearch_form shelf cat').addClass('visi');

});
}

// dokme remove
jQuery(document).ready(function($) {
	$('.pgSearch_form shelf cat').on('click', function(){
		$('#lmfe_inDiv_formd41d8c_q_cat input[type="hidden"][name="q_cat"]').val(0);
		$('#lmfe_inDiv_formd41d8c_q_cat .lmfe_catbox').html('همه گروه‌ها');
		$('.pgSearch_form shelf cat').removeClass('visi');
	});
});

