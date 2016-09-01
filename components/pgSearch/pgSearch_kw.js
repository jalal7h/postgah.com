
jQuery(document).ready(function($) {
	$('.pgSearch_kw > a').each(function(i){
		var fsize = Math.floor(Math.random() * 12) + 8;
		console.log( fsize );
		$(this).css( {'font-size' : fsize+'px' } );
	});
});