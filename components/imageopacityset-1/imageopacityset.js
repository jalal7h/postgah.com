/*footer*/
/*index*/

jQuery(document).ready(function($) {
	
	setTimeout( function(){
		$('img').each(function(i){
			if( $(this).css('opacity') == 1 ){
				$(this).css({'opacity':'0'} );
				$(this).one('inview', function(){
					$(this).animate({ 'opacity' : '1' }, 300);
				});
			}
		});
	}, 500 );
	
});



