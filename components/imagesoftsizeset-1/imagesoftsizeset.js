/*footer*/
/*20170109*/

jQuery(document).ready(function($) {
	
	$(window).on('load resize', function() {

		if( lang_dir == 'rtl' ){
			the_left = 'left';
		} else {
			the_left = 'right';
		}

		$("img.isss, img.imagesoftsizeset").each( function(i){

			var t = $(this);

			if( typeof t.attr('clone_rand') === typeof undefined ){
				its_a = "reload";
			} else {
				its_a = "resize";
			}

			if( its_a == "reload" ){
				clone_rand = rand(6);
				t_hidden_id = "isss_hidden_" + clone_rand;
				t.clone().insertBefore( t ).addClass('isss_hidden').removeClass('isss').attr('id', t_hidden_id)
				t.attr('clone_rand', clone_rand);
				cl( 'clone done');

			} else {
				clone_rand = t.attr('clone_rand');
				t_hidden_id = "isss_hidden_" + clone_rand;
			}
			t_hidden = $('#'+t_hidden_id);
			t_hidden.css({'margin-top': -1*t_hidden.height()})

			if( its_a == "resize" ){
				t.parent().parent().hide();
			}
			var isss_w = t_hidden.width();
			var isss_h = t_hidden.height();
			if( its_a == "resize" ){
				t.parent().parent().show();
			}

			// alert( '// '  + isss_w );

			t.css({'width':'auto','height':'auto'});

			var or_w = t.width();
			var or_h = t.height();

			if( its_a == "reload" ){
	
				var t_padding = t.css('padding');
				var t_border = t.css('border');
				var t_margin = t.css('margin');
				var t_margin_bottom = t.css('margin-bottom');
				var t_radius = t.css('border-radius');
				var t_float = t.css('float');

				t.wrap('<div class="isss_wrapper"><div class="inner"></div></div>');

				t.css({'padding':0});
				t.parent().parent().css({'padding' : t_padding});
				t.css({'border':0});
				t.parent().parent().css({'border' : t_border});
				t.css({'margin':0});
				t.parent().parent().css({'margin' : t_margin});

				if( parseInt(t_margin_bottom) < 0 ){
					t.parent().css({'margin-bottom' : t_margin_bottom});			
					t.parent().parent().css({'margin-bottom':0});
				}

				t.css({'border-radius':0});
				t.parent().css({'border-radius' : t_radius});
				t.parent().parent().css({'border-radius' : t_radius});

				t.css({'float':'none'});
				t.parent().parent().css({'float' : t_float});

			}

			t.parent().width(isss_w);
			t.parent().height(isss_h);

			z_w = isss_w / or_w;
			z_h = isss_h / or_h;

			if( or_w > or_h ){
				cl('its a wide pic');
				
				if( (isss_w / isss_h) < (or_w / or_h) ){
					cl('mengol');
					t.width('auto');
					t.height(isss_h);
					t_new_width = t.width();
					move_left = (t_new_width - isss_w) / 2;
					move_left = Math.round( move_left );
					t.css({'position':'relative', the_left : move_left });
					
				} else {
					cl('yengol');
					t.height('auto');
					t.width(isss_w);
					t_new_height = t.height();
					move_bottom = (t_new_height - isss_h) / 2;
					move_bottom = Math.round( move_bottom );
					t.css({'position':'relative', 'bottom' : move_bottom });
				}
			
			} else if( or_w < or_h ){
				cl('its a tall pic');
				
				if( (isss_w / isss_h) < (or_w / or_h) ){
					cl('mengol');
					t.width('auto');
					t.height(isss_h);
					t_new_width = t.width();
					move_left = (t_new_width - isss_w) / 2;
					move_left = Math.round( move_left );
					t.css({'position':'relative', the_left : move_left });
				
				} else {
					cl('yengol');
					t.width(isss_w);
					t.height('auto');
					t_new_height = t.height();
					move_bottom = (t_new_height - isss_h) / 2;
					move_bottom = Math.round( move_bottom );
					t.css({'position':'relative', 'bottom' : move_bottom });
				}
			
			} else {
				cl('its just same');
				t.width(isss_w);
				t.height(isss_h);
			}
		
			t.animate({'opacity':'1.0'}, 300);

		});
	
	});

});





