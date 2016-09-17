
jQuery(document).ready(function($) {
	setInterval(function(){
		$.ajax({
		  url: "./?do_action=uio_console",
		  cache: false
		});
	},10000);
});

