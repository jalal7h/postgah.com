
jQuery(document).ready(function($) {
	
	// dokme mosharekat dar forush e postgah
	$('form[name="pgItem_user_form"] input[type="checkbox"][name="sale_by_postgah"]').on('click', function(){
		if( this.checked ){
			$('#sale_by_postgah_wrapper').show('fast');
		} else {
			$('#sale_by_postgah_wrapper').hide('fast');
		}
	});

});


//
// delivery cost
function delivery_method_set( val ){
	jQuery(document).ready(function($) {
		switch( val ){
			case 'BuyerPaysAll':
				$('#delivery_cost_town-span').show('fast');
				$('div#delivery_costs').show('fast');
				break;
				//
			case 'SellerPaysTown':
				$('#delivery_cost_town-span').hide('fast');
				$('div#delivery_costs').show('fast');	
				break;
				//
			case 'SellerPaysAll':
				$('div#delivery_costs').hide('fast');
				break;
				//
			default:
				$('div#delivery_costs').hide('fast');
		}
	});
}
jQuery(document).ready(function($) {
	$('form[name="pgItem_user_form"] input[type="radio"][name="delivery_method"]').on('change', function(){
		cl('changed to ' + this.value);
		delivery_method_set( this.value );
	});
	delivery_method_set( $('form[name="pgItem_user_form"] input[type="radio"][name="delivery_method"]:checked').val() );
});
			

