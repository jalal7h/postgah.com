
$(document).ready(function(){
	
	//
	// preuploader remove agent
	$('.listmaker_formfield_file_preuploadedfiles_simple .remove').on('click', function(e){
		$.ajax({url: "./?do_action=listmaker_formfield_file_preuploadedfiles_remove&path=" + $(this).attr('rel')});
		$(this).parent().hide("fast");
		e.preventDefault();
	})
	
});

