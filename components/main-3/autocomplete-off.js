
jQuery(document).ready(function($) {
	setTimeout(function(){
		$("input").each(function(i) {
			the_tag_name = $(this).attr('name');
			if (typeof the_tag_name === 'undefined' ) {
				//
			} else if(! the_tag_name.indexOf( "[" ) ){
				//
			} else {
				the_value = $(this).val();
				$(this).val( '' );
				$(this).val( the_value );
			}
		});

	}, 100);
});
