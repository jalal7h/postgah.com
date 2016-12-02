
jQuery(document).ready(function($) {

	$('body').delegate('.abusereport_mg_mailToBadUser input[type="submit"]', 'click', function(e) {
		
		fm = $(this).parent();
		tx = fm.find('textarea');

		the_email = fm.attr('email');
		the_text = tx.val();
		$(this).addClass('gray');
		tx.attr('disabled',true);


		$.ajax({
			url: "./?do_action=abusereport_mg_mailToBadUser",
			method: "POST",
			data: { 'email' : the_email , 'text' : the_text },
			dataType: "html"
		
		}).done(function(){
			dehitbox_do();
		}); 

		e.preventDefault();
	});

});


