
jQuery(document).ready(function($) {
	
	if( $('.abusereport_mg_view').length ){ 

		$('.abusereport_mg_view .etc > a.mailToBadUser').on('click', function(){
			
			email = $(this).attr('email');
			text_textMessage = $(this).attr('text_textMessage');
			text_sendButton = $(this).attr('text_sendButton');

			hitbox( '<body><form class="abusereport_mg_mailToBadUser" email='+email+'" ><textarea name="text" placeholder="'+text_textMessage+'"></textarea><input class="submit_button red" type="submit" value="'+text_sendButton+'"/></form></body><script>$(".abusereport_mg_mailToBadUser textarea").focus();</script>' , 400, 320 );

		});


		$('.abusereport_mg_view .etc > a.smsToBadUser').on('click', function(){
			
			numb = $(this).attr('numb');
			text_textMessage = $(this).attr('text_textMessage');
			text_sendButton = $(this).attr('text_sendButton');

			hitbox( '<form class="abusereport_mg_smsToBadUser" numb="'+numb+'" ><textarea name="text" placeholder="'+text_textMessage+'"></textarea><input class="submit_button red" type="submit" value="'+text_sendButton+'"/></form><script>$(".abusereport_mg_smsToBadUser textarea").focus();</script>' , 400, 320 );

		});

	}

});



