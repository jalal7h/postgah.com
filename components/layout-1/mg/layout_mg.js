
$(document).ready(function(){

	// click on "rename" button
	$('.layout_mg > .this > .the_name a.rename_button').on('click', function(e){

		$(this).parent().parent().find('.name').hide();
		$(this).parent().parent().find('.rename_form').show();
		$(this).parent().parent().find('.rename_button_container').hide();

		$(this).parent().parent().find('.rename_form input:text').focus();
		$(this).parent().parent().find('.rename_form input:text').select();

		e.preventDefault();
	});

	// rename form submit
	$('.layout_mg > .this > .the_name .rename_form').on('submit', function(e){
		
		id = $(this).find('input:hidden').val();
		name = $(this).find('input:text').val();
		$.ajax({ url: "./?do_action=layout_mg_renameSave&id="+id+"&name="+name});
		
		$(this).parent().parent().find('.name').html( $(this).parent().parent().find('.rename_form input:text').val() );

		$(this).parent().parent().find('.name').show();
		$(this).parent().parent().find('.rename_form').hide();
		$(this).parent().parent().find('.rename_button_container').show();

		e.preventDefault();
	});

});