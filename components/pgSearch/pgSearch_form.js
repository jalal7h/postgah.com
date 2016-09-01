
jQuery(document).ready(function($) {
	$('.pgSearch_form').on('submit', function(e){
		var the_q = $(this).find('input[type="text"]');
		if( the_q.val()=='' ){
			e.preventDefault();			
		}
	});
});
