
jQuery(document).ready(function($) {
	
	$('.pgItem_item_list_filters input[type="button"]').on('click', function(){
		$('.pgItem_item_list_filters input[name="price_range"]').trigger('change');
	});

});

