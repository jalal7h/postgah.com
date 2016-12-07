
jQuery(document).ready(function($) {
	setInterval(function(){
		$.ajax({
		  url: "./?do_action=useronline_console",
		  cache: false
		});
	},10000);
});

