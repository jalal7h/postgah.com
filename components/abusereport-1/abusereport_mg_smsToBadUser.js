
jQuery(document).ready(function($) {

	$('body').delegate('.abusereport_mg_smsToBadUser input[type="submit"]', 'click', function(e) {
		
		fm = $(this).parent();
		tx = fm.find('textarea');

		the_numb = fm.attr('numb');
		the_text = tx.val();
		$(this).addClass('gray');
		tx.attr('disabled',true);


		$.ajax({
			url: "./?do_action=abusereport_mg_smsToBadUser",
			method: "POST",
			data: { 'numb' : the_numb , 'text' : the_text },
			dataType: "html"
		
		}).done(function(){
			dehitbox_do();
		}); 

		e.preventDefault();
	});

});


