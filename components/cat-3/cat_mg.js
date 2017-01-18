
$(document).ready(function($) {
	
	$('#cat_form_management .itgc_grid2 > form > input[type=text]').on('focus', function(){
		$(this).parent().find('input[type=text]').css({'width':'60px'});
		$(this).css({'width':'340px'});
	}).on('blur', function(){
		$(this).parent().find('input[type=text]').css({'width':''});
	});
	$('#cat_form_management #new.itgc_grid2 > form > input[type=text]').css({'width':'60px'});
	$('#cat_form_management #new.itgc_grid2 > form > input[type=text]').first().css({'width':'340px'});

	$('#cat_form_management .itgc_grid3 > form > input[type=text]').on('focus', function(){
		$(this).parent().find('input[type=text]').css({'width':'60px'});
		$(this).css({'width':'274.5px'});
	}).on('blur', function(){
		$(this).parent().find('input[type=text]').css({'width':''});
	});
	$('#cat_form_management #new.itgc_grid3 > form > input[type=text]').css({'width':'60px'});
	$('#cat_form_management #new.itgc_grid3 > form > input[type=text]').first().css({'width':'274.5px'});


	$('#cat_mg icon.toggle').on('click',function(){

		t = $(this).parent().parent();

		if( t.hasClass('on') ){
			it_was = 'on';
			it_will = 'off';
			flag = 0;
		} else {
			it_was = 'off';
			it_will = 'on';
			flag = 1;
		}

		$(this).removeClass('fa-toggle-'+it_was);
		$(this).addClass('fa-toggle-'+it_will);

		t.removeClass(it_was);
		t.addClass(it_will);

		$.ajax({
			url: _URL+'/?do_action=cat_mg_setFlag',
			data: { 'id': t.attr('the_id'), 'flag': flag },
		
		}).done(function( html ) {
			if( html != 'OK' ){
				alert('something wrong');
			}
		}).fail(function() {
			alert('something wrong');
		})

	});

});


