
jQuery(document).ready(function($) {
	$('.lmfe_inDiv.catcheck .list > label > input[type="checkbox"]').on('click', function(){

		t = $(this);
		l = t.parent().parent();
		h = l.find(' > input');

		h_val = '_';

		l.find('label > input[type="checkbox"]').each(function(index, el) {
			
			if( $(this).prop('checked') ){
				h_val+= $(this).attr('cat_id') + '_';
			}

		});

		if( h_val == '_' ){
			h_val = '';
		}
		
		h.val( h_val );

	});
});
