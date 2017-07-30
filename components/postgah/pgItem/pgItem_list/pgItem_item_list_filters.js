
jQuery(document).ready(function($) {
	
	$('.pgItem_item_list_filters input[type="button"]').on('click', function(){
		
		pf = parseInt( $('.pgItem_item_list_filters .price_from').val() );
		pt = parseInt( $('.pgItem_item_list_filters .price_to').val() );

		cl( pf + ' -> ' + pt );

		if( pt >= pf ){
			
			// cl( pt +' is bigger than '+ pf );

			if( !isnumeric(pf) || pf < 0 ){
				pf = 0;
			}
			if( !isnumeric(pt) || pt < 0 ){
				pt = 'n';
			}
			
			p = pf+'-'+pt;
			
			$('.pgItem_item_list_filters input[name="price_range"]').val(p).trigger('change');

		}

	});

});

