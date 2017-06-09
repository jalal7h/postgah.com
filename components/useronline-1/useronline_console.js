
jQuery(document).ready(function($) {
	
	setInterval(function(){
		$.ajax({
		  url: _URL + "/?do_action=useronline_console",
		  cache: false
		});
	}, 30000 );

});

