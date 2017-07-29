
jQuery(document).ready(function($) {
	
	$('.pgItem_item_list_filters input[type="button"]').on('click', function(){
		
		pf = $('.pgItem_item_list_filters .price_from').val();
		pt = $('.pgItem_item_list_filters .price_to').val();

		if( !isnumeric(pf) || pf < 0 ){
			pf = 0;
		}
		if( !isnumeric(pt) || pt < 0 || pt < pf ){
			pt = 'n';
		}
		
		p = pf+'-'+pt;
		
		$('.pgItem_item_list_filters input[name="price_range"]').val(p).trigger('change');
	});

});

