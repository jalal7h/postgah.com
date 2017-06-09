
jQuery(document).ready(function($) {
	
	$('.contact_mg_form textarea[name="reply_content"]').on('click', function(){
		$(this).height(150);
	})

	$('div.contact_mg_form form').on('submit', function(e){
		if( $(this).find('textarea').val()=='' ){
			e.preventDefault();
		}
	});

});