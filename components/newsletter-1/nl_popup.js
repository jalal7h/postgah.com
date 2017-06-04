
$(document).ready(function(){

	$('#popup_newsletter').on('click', function(e){
		hitbox('<iframe src="./?do_action=nl_index_form&covered=1" style="width: 100%; height: 100%; "></iframe>', 400, 400 );
		e.preventDefault();
	});

});

