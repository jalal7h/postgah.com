
$(document).ready(function($) {
	$('#cat_form_management a.customfield').on('click', function(e){
		id = $(this).attr('id');
		hitbox('<iframe width=100% height=100% src="./?do_action=catcustomfield_mg&page=admin&cat_id='+id+'" frameborder=0 ></iframe>');
		e.preventDefault();
	});
});