
// 2017/06/23

jQuery(document).ready(function($) {
	

	$('body').delegate('.lmfe_isKeyword > input[type="text"]', 'keydown', function( e ) {

		// define vairables
		var the_text = $(this);
		var max = the_text.attr('max');
		var max_alert = the_text.attr('max_alert');
		cl( max_alert);
		var the_container = $(this).parent();
		var the_hidden = the_container.find('input[type="hidden"]');
		var this_word;

		the_text.attr( 'size', the_text.val().length + 10 );
		cl( the_text.val().length + 10 );

		if( e.which == 13 ){

			this_word = the_text.val().trim();
			the_search_match = ','+the_hidden.val()+',';
			the_search_word = ','+this_word+',';


			if( max > 0 && the_hidden.val().split(',').length >= max ){
				cl('max keywords');
				alert( max_alert );
				e.preventDefault();

			} else if( this_word == '' ){
				//
				cl('the new word is blank');

			} else if( (the_search_match.match(the_search_word) || []).length > 0 ){
				//
				cl('the word is repeaty');
				e.preventDefault();
	
			} else {
				// update the hidden
				if( the_hidden.val() == '' ){
					the_hidden_new_content = this_word;
				} else {
					the_hidden_new_content = the_hidden.val()+","+this_word;
				}
				the_hidden.val( the_hidden_new_content );
				// update the spans
				kwc_id = the_container.attr('id');
				lmfe_keyword_set_spans( kwc_id );
	
				e.preventDefault();
			}

			the_text.val('');
			the_text.attr('size', 10);

		}

	});


	$('.lmfe_isKeyword').each(function(i) {
		kwc_id = $(this).attr('id');
		lmfe_keyword_set_spans(kwc_id);
	});


	$('body').delegate('.lmfe_isKeyword > span.kw_w > span', 'click', function() {

		the_word = $(this).html();
		the_word = ","+the_word+",";

		the_container = $(this).parent().parent();
		the_hidden = the_container.find('input[type="hidden"]');
		
		the_words_str = ","+the_hidden.val()+",";
		the_words_str = the_words_str.replace( the_word , ",");
		the_words_str = the_words_str.substr(1,the_words_str.length-2);

		the_hidden.val( the_words_str );
		$(this).remove();

		the_container.find('input[type="text"]').focus();

	});


});

function lmfe_keyword_set_spans( kwc_id ){
	
	the_container = $('#'+kwc_id);
	the_hidden = the_container.find('input[type="hidden"]');
	the_kww = the_container.find('span.kw_w');
	
	the_words_str = the_hidden.val();
	the_words_str = the_words_str.replace(/،/gi, ",");
	the_words_arr = the_words_str.split(',');
	
	cl( 'count is ' +  the_words_arr.length );

	the_kww.html('');
	for( i=0; i<the_words_arr.length; i++ ){
		
		the_word = the_words_arr[i].trim();
		if( the_word == '' ){
			continue;
		}

		the_word_span = '<span>' + the_word + '</span>';
		the_kww.append(the_word_span);

	}

}







