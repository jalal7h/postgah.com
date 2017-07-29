
jQuery(document).ready(function($) {

	// age form khali bud taid nashe
	$('.pgSearch_form').on('submit', function(e){
		var the_q = $(this).find('input[type="text"]');
		if( the_q.val()=='' ){
			e.preventDefault();			
		}
	});

	// dokme taid
	$('.pgSearch_form .submit').on('click', function(){
		$(this).closest('form').submit();
	})

});
