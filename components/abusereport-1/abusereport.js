
jQuery(document).ready(function($) {
	
	$('.abusereport').on('click', function(e){
		
		table_name = $(this).attr('table_name');
		table_id = $(this).attr('table_id');
		text_sendButton = $(this).attr('text_sendButton');
		text_textMessage = $(this).attr('text_textMessage');
		select_option = $(this).attr('select_option');
		
		hitbox( '<iframe name="_hidden" style="display:none;"></iframe><form class="abusereport_form" method="post" target="_hidden" action="./?do_action=abusereport_do&table_name='+table_name+'&table_id='+table_id+'"><textarea name="text" placeholder="'+text_textMessage+'"></textarea><input class="submit_button" type="submit" value="'+text_sendButton+'"/><select name="cat_id">'+select_option+'</select></form><script>$(".abusereport_form textarea").focus();</script>' , 600, 420 );

		e.preventDefault();

	});
	
});

