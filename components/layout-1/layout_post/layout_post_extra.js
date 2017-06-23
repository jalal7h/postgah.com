/*admin*/

jQuery(document).ready(function($) {
	
	$('.layout_post_extra .types input[name="type"]').on('click', function(){

		switch ( $(this).val() ) {
			
			case 'TEXT':
				tinyMCE_off('_data');
				$('#_data').prop( 'dir', lang_dir );
				break;

			case 'HTML':
				tinyMCE_on('_data');
				$('#_data').prop( 'dir', lang_dir );
				break;

			case 'PHP5':
				tinyMCE_off('_data');
				$('#_data').prop( 'dir', 'ltr' );
				break;

		}

	});

});

