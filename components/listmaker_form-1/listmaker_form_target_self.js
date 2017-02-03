// 2017/01/20

jQuery(document).ready(function($) {
	
	$('form.lmfo.target_self').on('submit', function(e){

		if(! lmfe_isNeeded_flag ){

			t = $(this);
			action = t.attr('action');
			button = t.find('input[type="submit"]');
			prompt = t.find('.lmfe_submit_prompt');

			the_button_color = button.css('background-color');
			cl( the_button_color );
			button.attr('disabled',true);

			var data_to_send_arr = [];
			var data_to_send = '';
			var i = 0;

			t.find('input,textarea,select').each(function(index, el) {
				if( el.type != 'submit' ){
					data_to_send_arr[i++] = el.name + '=' + encodeURI(el.value);
				}
			});

			data_to_send = data_to_send_arr.join('&');

			$.ajax({
				url: action,
				type: 'POST',
				data: data_to_send,

			}).done(function() {
				prompt.css({'opacity':'1'});
				button.attr('disabled',false);
				button.css({'background-color':the_button_color});
				setTimeout( function(){
					prompt.animate({'opacity':'0'}, 2000 );
				}, 1000 );
			});

		}

		e.preventDefault();
		return false;

	});

});

