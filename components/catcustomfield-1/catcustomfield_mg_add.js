
jQuery(document).ready(function($) {
	

	// add button - open tiny window
	$('.catcustomfield_mg_add').on('click', function(e){
		
		var the_form = '<div class="catcustomfield_mg_add_form">';

		$.ajax({
			url: _URL+'/?do_action=catcustomfield_get_ccf_element_list',
			type: 'POST',
			data: {param1: 'value1'},
		
		}).done(function( json ) {
			var ccf = jQuery.parseJSON(json);
			var i = 0;
			$.each(ccf, function(idx, obj) {
				the_form+= "<div type=\""+idx+"\" class=\"btn btn-primary btn-lg btn-block\">"+obj+"</div>";
				i++;
			});
			the_form+= '</div>';
			hitbox( the_form , 500, ( (i*51) + 55) );
		});

		e.preventDefault();
	});


	// click on element on tiny window on add button
	$("body").delegate('.catcustomfield_mg_add_form > div', "click", function(e) {
		
		the_type = $(this).attr('type');
		cat_id = $('.catcustomfield_mg .list').attr('cat_id');

		$.ajax({
			url: _URL+'/?do_action=catcustomfield_mg_add',
			data: { 'cat_id': cat_id, 'type': the_type },
		
		}).done(function( html ) {

			$('.catcustomfield_mg .list_w .convbox').hide();
			$('.catcustomfield_mg .list').append( html );
			
			dehitbox_do();

		});
		
		e.preventDefault();
	});


});

