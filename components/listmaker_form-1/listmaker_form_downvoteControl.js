
jQuery(document).ready(function($) {
	
	$('.lmfo').on('submit', function(e){
		
		$(this).find('[downvote="1"]').each(function(index, el) {
			$(this).focus();
			e.preventDefault();
			return false;			
		});

	});

});

