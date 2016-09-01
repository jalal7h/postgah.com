
jQuery(document).ready(function($) {
	$('div.layout-post > div.header').each(function( i ){
		if( $(this).html()=='' ){
			$(this).parent().addClass('noHeader');
			$(this).remove();
		}
	});
});
