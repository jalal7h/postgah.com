
jQuery(document).ready(function($) {
	$('.contact_vw_form').on('submit', function(){

		if( $(this).find('select[name="to"]').val() == '0' ){
			$(this).find('select[name="to"]').focus();
			return false;

		} else if( $(this).find('input[name="subject"]').val().trim() == '' ){
			$(this).find('input[name="subject"]').focus();
			return false;

		} else if( $(this).find('input[name="email"]').val().trim() == '' ){
			$(this).find('input[name="email"]').focus();
			return false;

		} else if( $(this).find('textarea').val().trim() == '' ){
			$(this).find('textarea').focus();
			return false;

		} else {
			return true;
		}

	})
});
