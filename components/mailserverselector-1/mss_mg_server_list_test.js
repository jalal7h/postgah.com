
/*admin*/

jQuery(document).ready(function($) {
	$('a[name="mss_mg_server_list_test"]').on('click',function(e){
		
		var mail_to = prompt( "Your email address", "jalal7h@gmail.com", "rtl" ); 
		
		if( mail_to ){

			hitbox('<img src="'+_URL+'/image_list/mss_loading.gif" width=300 height=300 />', 300, 300 );

			$.ajax({
				url: $(this).attr('href'),
				type: 'POST',
				data: {'mail_to': mail_to},
						
			}).done(function( html ) {
				hitbox( html , 400 , 400 );
				setTimeout(function(){
					dehitbox_do();
				},1200);
			});
		}

		e.preventDefault();
		return false;

	});
});

