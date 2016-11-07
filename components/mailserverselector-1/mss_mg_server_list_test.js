
/*admin*/

jQuery(document).ready(function($) {
	$('a[name="mss_mg_server_list_test"]').on('click',function(e){
		
		cl('ss');

		var mail_to = prompt("Your email address", "jalal7h@gmail.com"); 
		
		if( mail_to == '' ){
			alert('Invalid email address!');
		
		} else {
			$.ajax({
				method: "POST",
				url: $(this).attr('href')+"&mail_to="+mail_to ,
			
			}).done(function( html ) {
				hitbox( html , 500 , 400 );
			});
		}
		
		e.preventDefault();

	});
});

