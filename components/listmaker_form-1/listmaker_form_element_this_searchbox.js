
jQuery(document).ready(function($) {

	$('.lmfe_inDiv.searchbox input[type="text"]').on('keydown',function(e){

		tx = $(this);
		dv = tx.parent();
		id = dv.find('input[type="hidden"]');
		ls = dv.find('div.list');
		tnit = dv.find('.lmfe_tnit');
		hv = ls.find('div.hover');

		if( e.keyCode == 13 ){
			
			if( hv.length && $('.lmfe_inDiv.searchbox .list').css('display') == 'block' ){

				id.val( hv.attr('the_id') );
				tx.val( hv.html() );

				hv.remove();
				ls.hide();

				e.preventDefault();

			}
	
		} else if( e.keyCode == 27 ){
			hv.remove();
			ls.hide();
		}

	});
	
	// open list and search
	$('.lmfe_inDiv.searchbox input[type="text"]').on('keyup',function(e){

		tx = $(this);
		dv = tx.parent();
		id = dv.find('input[type="hidden"]');
		ls = dv.find('div.list');
		tnit = dv.find('.lmfe_tnit');

		navigator_i = ls.attr('nav');

		if( e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40 || e.keyCode == 13 || e.keyCode == 27 ){

			if( ls.html() == '<div>' + ls.attr('text_loading') + '</div>' ){
				return false;
			}

			if( e.keyCode == 38 ){
				if( navigator_i > 1 ){
					navigator_i--;
				}
			
			} else if( e.keyCode == 40 ){
				count_of_result = $('.lmfe_inDiv.searchbox .list > div').length;
				if( navigator_i < count_of_result ){
					navigator_i++;
				}
			}

			ls.attr('nav',navigator_i);

			$('.lmfe_inDiv.searchbox .list > div').removeClass('hover');
			nv = $('.lmfe_inDiv.searchbox .list > div:nth-child('+navigator_i+')');
			nv.addClass('hover');

			return false;
		
		}
		
		// if its not navigation, forget the old nav
		$('.lmfe_inDiv.searchbox .list > div').removeClass('hover');
		ls.attr('nav','0');

		if( tx.val().length < 3 ){
			ls.hide();

		} else {

			ls.css({ width : tx.outerWidth(true), top : tx.outerHeight(true) });
			
			if( ls.attr('lang_dir') == 'rtl' ){
				ls.css({ right : tnit.outerWidth(true) });
			} else {
				ls.css({ left : tnit.outerWidth(true) });
			}

			ls.show();
			ls.html( '<div>' + ls.attr('text_loading') + '</div>' );

			$.ajax({
				url: "./?do_action=listmaker_form_element_this_searchbox_load",
				method: "POST",
				data: { 'feed' : ls.attr('js_feed') , 'text' : tx.val() },
				dataType: "html"
			
			}).done(function( html ){
				ls.html(html);
			}); 

		}

	});


	// submit the option
	$('body').delegate('.lmfe_inDiv.searchbox .list > div', 'click', function() {

		selected = $(this);
		list = selected.parent();
		lmf_div = list.parent();
		hidden_input = lmf_div.find('input[type="hidden"]');
		text_input = lmf_div.find('input[type="text"]');

		hidden_input.val( selected.attr('the_id') );
		text_input.val( selected.html() );

		list.hide();

	});

	
});










