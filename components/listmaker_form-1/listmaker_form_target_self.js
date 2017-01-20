// 2017/01/20

jQuery(document).ready(function($) {
	
	$('form.lmfo.target_self').on('submit', function(e){

		if(! lmfe_isNeeded_flag ){

			t = $(this);
			action = t.attr('action');
			button = t.find('input[type="submit"]');
			prompt = t.find('.lmfe_submit_prompt');

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
				setTimeout( function(){
					prompt.animate({'opacity':'0'}, 2000 );
				}, 1000 );
				button.attr('disabled',false);
			});

		}

		e.preventDefault();
		return false;

	});

});

