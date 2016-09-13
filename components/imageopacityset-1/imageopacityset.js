
// 2016/09/12

/*index*/

jQuery(document).ready(function($) {
	
	$('img').each(function(i){
		
		if( $(this).css('opacity') == 1 ){
			
			$(this).css({'opacity':'0'} );
			
			$(this).one('inview', function(){
				$(this).css({ 'opacity' : '1' });
			});

		}

	});

});



