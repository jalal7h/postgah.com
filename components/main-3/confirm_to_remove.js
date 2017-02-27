
jQuery(document).ready(function($) {
		
	$('[confirm]').each(function(index, el) {
		t = $(this);
		t.on('click', function(e){
			if(! confirm( t.attr('confirm') )  ){
				e.preventDefault();
				return false;
			}
		});
	});

});

