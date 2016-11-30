
$(document).ready(function(){
	$('.ezTicket_user_form').on('submit', function( event ){
		if( $('.ezTicket_user_form .text').val()=='' ){
			$('.ezTicket_user_form .text').focus();
			$('.ezTicket_user_form .text').css({'border':'1px solid red','background':'white'});
			event.preventDefault();
		}
		if(isNewForm!=1){
			return true;
		}
		// else
		if( $('.ezTicket_user_form .name').val()=='' ){
			$('.ezTicket_user_form .name').focus();
			$('.ezTicket_user_form .name').css({'border':'1px solid red','background':'white'});
			event.preventDefault();
		} else if( $('.ezTicket_user_form .dept').val()=='' ){
			$('.ezTicket_user_form .dept').focus();
			$('.ezTicket_user_form .dept').css({'border':'1px solid red','background':'white'});
			event.preventDefault();
		} else {
			return true;
		}
	});

});
