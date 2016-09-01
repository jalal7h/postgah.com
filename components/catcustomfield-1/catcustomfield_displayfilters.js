
jQuery(document).ready(function($) {

	if( typeof ccf_main_cat_id !== 'undefined' && ccf_main_cat_id ){

		$('.option_container > input[type="checkbox"]').on('change', function(){
						
			var elem_name = $(this).attr('name');
			var elem_value = $(this).prop("checked") ? 1 : 0;
			var the_url = _URL + "/?page=" + _PAGE + '&cat_id=' + ccf_main_cat_id;

			// cl( elem_name + ' / ' + elem_value );

			$('.option_container > input[type="checkbox"]').each(function(i){
				var each_elem_name = $(this).attr('name');
				var each_elem_value = $(this).prop("checked") ? 1 : 0;
				// cl( ':: ' + each_elem_name + ' / ' + each_elem_value );
				if( each_elem_value==1 ){
					the_url = the_url + '&' + each_elem_name + '=' + each_elem_value;
				}
			});

			// cl( the_url );
			location.href = the_url;

		});

	}

});


