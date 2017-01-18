
jQuery(document).ready(function($) {
	

	// load edit form
	$("body").delegate('.catcustomfield_mg .list .field_w', "click", function() {
		the_id = $(this).attr('the_id');
		hitbox( iframe( _URL+'/?do_action=catcustomfield_mg_form&page=admin&id='+the_id ), 800, 600 );
	});


	// tools
	$("body").delegate('.catcustomfield_mg .list .field_w .tools', 'click', function(e){
		e.preventDefault();
		return false;
	});


	// less
	$("body").delegate('.catcustomfield_mg .list .field_w .tools > icon.less', "click", function() {
		
		t = $(this).parent().parent().parent();
		the_id = t.attr('the_id');
		gN = getGridNumber( t );
		t.removeClass('grid'+gN);
		if( gN > 1 ){
			gN--;
		}
		t.addClass('grid'+gN);
		
		$.ajax({
			url: _URL+'/?do_action=catcustomfield_mg_setGrid',
			data: { 'id': the_id, 'grid': gN },
		
		}).done(function(html){
			if( html != 'OK' ){
				alert('something wrong');
			}
		});
		
	});


	// more
	$("body").delegate('.catcustomfield_mg .list .field_w .tools > icon.more', "click", function() {

		t = $(this).parent().parent().parent();
		the_id = t.attr('the_id');
		gN = getGridNumber( t );
		t.removeClass('grid'+gN);
		if( gN < 12 ){
			gN++;
		}
		t.addClass('grid'+gN);
		
		$.ajax({
			url: _URL+'/?do_action=catcustomfield_mg_setGrid',
			data: { 'id': the_id, 'grid': gN },
		
		}).done(function(html){
			if( html != 'OK' ){
				alert('something wrong');
			}
		});

	});


	// remove
	$("body").delegate('.catcustomfield_mg .list .field_w .tools > icon.remove', "click", function() {

		if( confirm( text_remove_ccf ) ){
	
			t = $(this).parent().parent().parent();
			the_id = t.attr('the_id');
			
			t.hide();

			count_of_fields = t.parent().find('>div.field_w').length;
			t.remove();
			if( count_of_fields == 1 ){
				$('.catcustomfield_mg .list_w .convbox').show();
			}

			$.ajax({
				url: _URL+'/?do_action=catcustomfield_mg_remove',
				data: { 'id': the_id },
			
			}).done(function(html){
				if( html != 'OK' ){
					t.show();
					$('.catcustomfield_mg .list_w .convbox').hide();
					alert('something wrong');
				} else {
					t.remove();
				}
			});

		}

	});


	// toggle
	$("body").delegate('.catcustomfield_mg .list .field_w .tools > icon.toggle', "click", function() {

		t_div = $(this).parent().parent();
		t = t_div.parent();

		if( $(this).hasClass('fa-toggle-off') ){
			it_was = 'off';
			it_will = 'on';
			flag = 1;
		} else {
			it_was = 'on';
			it_will = 'off';
			flag = 0;
		}

		// cl( it_was + ' -> ' + it_will );

		$(this).removeClass('fa-toggle-'+it_was);
		$(this).addClass('fa-toggle-'+it_will);

		t_div.removeClass(it_was);
		t_div.addClass(it_will);

		the_id = t.attr('the_id');

		$.ajax({
			url: _URL+'/?do_action=catcustomfield_mg_setFlag',
			data: { 'id': the_id, 'flag': flag },
		
		}).done(function(html){
			if( html != 'OK' ){
				alert('something wrong');
			}
		});

	});


});









