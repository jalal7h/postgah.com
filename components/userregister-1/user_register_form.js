
jQuery(document).ready(function($) {
	


	$('#lmfe_formee11cb_cell').on('blur', function(){
		
		if( $('form.user_register_form').attr('mobile_login') == 1 ){
			
			if( $(this).val() == '' ){
				$('#lmfe_formee11cb_email').prop('required',true)
			
			} else {
				$('#lmfe_formee11cb_email').prop('required',false)
			}
		
		} else {
			$('#lmfe_formee11cb_email').prop('required',true)
			$('#lmfe_formee11cb_cell').prop('required',false)
		}

	});



	$('#lmfe_formee11cb_email').on('blur', function(){
		
		if( $('form.user_register_form').attr('mobile_login') == 1 ){
			
			if( $(this).val() == '' ){
				$('#lmfe_formee11cb_cell').prop('required',true)
			
			} else {
				$('#lmfe_formee11cb_cell').prop('required',false)
			}
		
		} else {
			$('#lmfe_formee11cb_email').prop('required',true)
			$('#lmfe_formee11cb_cell').prop('required',false)
		}

	})



	$('form.user_register_form').on('submit', function(e){
		
		if( $(this).attr('mobile_login') == 1 ){
			if( $('#lmfe_formee11cb_email').val() == '' && $('#lmfe_formee11cb_cell').val() == '' ){
				$('#lmfe_formee11cb_email').focus()
				e.preventDefault()
				return false
			}

		} else {
			if( $('#lmfe_formee11cb_email').val() == '' ){
				$('#lmfe_formee11cb_email').focus()
				e.preventDefault()
				return false
			}
		}

	})



});

