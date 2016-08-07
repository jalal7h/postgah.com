
// 2016/05/14

$(document).ready(function($) {
	
	$('.lmfetfp .remove').on('click', function(e){

		var TableIdColumn_md5 = $(this).attr('rel');
		var the_url = _URL+"/?do_action=listmaker_form_element_this_file__preload_remove&TableIdColumn_md5="+TableIdColumn_md5;

		$.ajax({url: the_url });
		$(this).parent().hide();
		
		e.preventDefault();
	})

});