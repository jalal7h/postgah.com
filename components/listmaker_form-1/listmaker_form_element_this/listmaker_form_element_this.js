// 2017/01/20

var lmfe_isNeeded_flag = false;

$(document).ready(function($) {

	// lmfe_isNeeded
	$('.lmfe_isNeeded').closest("form").on('submit', function(e){

		$(this).find('.lmfe_isNeeded').each(function( index ) {
  			
  			if( $(this).val()=='' || $(this).val()==0 ){
  				
  				if( $(this).prop('tagName') == 'INPUT' && $(this).prop('type') == 'hidden' ){
  					$(this).parent().find('.lmfe_catbox,.lmfe_positionbox,.lmfe_searchbox').addClass('lmfe_redline');
  				} else {
	  				$(this).addClass('lmfe_redline');
  					$(this).focus();
  				}

  				lmfe_isNeeded_flag = true;

  				e.preventDefault();
  				return false;
  			
  			} else {
  				lmfe_isNeeded_flag = false;
  			}

		});

	});
	$('body').delegate('.lmfe_redline', 'keypress click', function(e) {
		$(this).removeClass('lmfe_redline');
	});

	// lmfe_more
	var lmfe_c = 0;
	$("body").delegate('.lmfe_more icon', "click", function() {	

		// more_c
		lmfe_more_c_handle = $(this).closest('.lmfe_more_c');
		
		// lmfe_more
		lmfe_more_handle = lmfe_more_c_handle.find('.lmfe_more');
		lmfe_more_id = lmfe_more_handle.attr('id');
		lmfe_more_html = lmfe_more_handle.html();
		
		// new_item_id
		lmfe_c++;
		lmfe_more_new_item_id = lmfe_more_id + lmfe_c;
		
		// this is special only for `cat`
		rand_numb = Math.floor((Math.random() * 10) + 1);
		lmfe_more_html = str_replace('lmfetc_rand_', 'lmfetc_rand_'+rand_numb, lmfe_more_html);

		// append
		lmfe_more_html = '<span class="lmfe_more added" id="' + lmfe_more_new_item_id + '">' + lmfe_more_html + '</span>';
		lmfe_more_c_handle.append( lmfe_more_html );
		
		// clean
		$('#'+lmfe_more_new_item_id+' .lmfe_tnit').html('');
		$('#'+lmfe_more_new_item_id+' input').val('');
		$('#'+lmfe_more_new_item_id+' input').attr('value','');
		$('#'+lmfe_more_new_item_id+' input').addClass('removeButton');
		$('#'+lmfe_more_new_item_id+' input').after('<remove></remove>');
		$('#'+lmfe_more_new_item_id+' icon').hide();
		$('#'+lmfe_more_new_item_id+' .lmfetfp').hide();
		$('#'+lmfe_more_new_item_id+' .lmfetc .lmfetc .lmfetc').html('');
		$('#'+lmfe_more_new_item_id+' .lmfetc .lmfetc select').val('');

		if( $(this).parent().hasClass('catbox') ){
			var lang_select = $('.lmfe_catbox').attr('lang_select');
			$('#'+lmfe_more_new_item_id+' input[type="hidden"]').val('0');
			var the_text = $(this).parent().find('.lmfe_catbox_c > input[type="hidden"]').attr('name');
			the_text = lang_select+' ' + $(this).closest('form').find('input[name="'+the_text+'"]').first().closest('.lmfe_inDiv.catbox').find('.lmfe_tnit').html();
			$('#'+lmfe_more_new_item_id+' span > span').html( the_text );
		
		} else if( $(this).parent().hasClass('positionbox') ){
			var lang_select = $('.lmfe_positionbox').attr('lang_select');
			$('#'+lmfe_more_new_item_id+' input[type="hidden"]').val('0');
			var the_text = $(this).parent().find('.lmfe_positionbox_c > input[type="hidden"]').attr('name');
			the_text = lang_select+' ' + $(this).closest('form').find('input[name="'+the_text+'"]').first().closest('.lmfe_inDiv.positionbox').find('.lmfe_tnit').html();
			$('#'+lmfe_more_new_item_id+' span > span').html( the_text );
		
		}

	});


	// content_min
	$('body').delegate('.lmfe_inDiv input, .lmfe_inDiv textarea', 'keyup', function(){
		// $(this).closest('form').attr( 'lmfe_minOrMax_closed', 0 );
		lmfe_content_minOrMaxLimit_setFormState( $(this) , 'min' );
		lmfe_content_minOrMaxLimit_setFormState( $(this) , 'max' );
	});
	// start of edit form
	$('.lmfe_inDiv input, .lmfe_inDiv textarea').each(function(i){
		lmfe_content_minOrMaxLimit_setFormState( $(this) , 'min' );
		lmfe_content_minOrMaxLimit_setFormState( $(this) , 'max' );
	});
	// form submit
	$('body').delegate('form[lmfe_minOrMax_closed="1"]', 'submit', function(e){
		cl('the form is disabled');
		// focus
		list_if_needs = minOrMax_list_of_needs.trim().split(' ');
		the_first_need = list_if_needs[0].split('~');
		cl( the_first_need[1] );
		$('#'+the_first_need[1]).focus();
		$('#'+the_first_need[1]).addClass('lmfe_redline');
		// stop the form
		e.preventDefault();
	});


});


function lmfe_content_minOrMaxLimit_setFormState( ts, minOrMax ){

	var content_attr = ts.attr('content_'+minOrMax);
	if (typeof content_attr !== typeof undefined && content_attr !== false) {

		var val = ts.val();
		var the_limit = ts.attr( 'content_'+minOrMax );

		if(! isNaN(the_limit) ){
			the_limit_type = "c";
			the_limit_numb = the_limit;
		
		} else {
			the_limit_type = the_limit.substr( the_limit.length-1, the_limit.length );
			the_limit_numb = the_limit.substr( 0, the_limit.length-1 );
		}

		switch( the_limit_type ){
			
			case 'w':
				val_count = val.replace('.',' ').trim().split(' ').length;
				break;

			case 'c':
				val_count = val.length;
				break;

		}

		if( minOrMax == 'min' ){
			// cl( minOrMax + ' # ' + ' val_count ' + val_count + ' ; the_limit_numb ' + the_limit_numb );
			condition = ( val_count < the_limit_numb );
		
		} else if( minOrMax == 'max' ){
			// cl( minOrMax + ' # ' + ' val_count ' + val_count + ' ; the_limit_numb ' + the_limit_numb );
			condition = ( val_count > the_limit_numb );
		
		} else {
			return false;
		}

		ts.parent().find('> .lmfe_minOrMax > .cur > .count_of_current_'+the_limit_type).html( val_count );

		if( condition ){
			ts.closest('form').attr('lmfe_minOrMax_closed','1');
			cl( minOrMax + '~' + ts.attr('id') + ' is closed' );
			minOrMax_list_of_needs_add( minOrMax + '~' + ts.attr('id') );

		} else {
			minOrMax_list_of_needs_remove( minOrMax + '~' + ts.attr('id') );
			cl( minOrMax + '~' + ts.attr('id') + ' is open' );
			if(! minOrMax_list_of_needs_checkIfAny() ){
				ts.closest('form').attr('lmfe_minOrMax_closed','0');
				cl('form is open all');
			}
		}

	}

}


var minOrMax_list_of_needs = '';

function minOrMax_list_of_needs_add( the_id ){
	if( minOrMax_list_of_needs.search( the_id + ' ' ) == -1 ){
		minOrMax_list_of_needs = minOrMax_list_of_needs + the_id + ' ';
	}
	// cl( 'add ' + the_id );
	cl( 'needs: ' + minOrMax_list_of_needs );
}

function minOrMax_list_of_needs_remove( the_id ){
	minOrMax_list_of_needs = minOrMax_list_of_needs.replace( the_id+' ' , '' );
	// cl( 'remove ' + the_id );
	cl( 'needs: ' + minOrMax_list_of_needs );
}

function minOrMax_list_of_needs_checkIfAny(){

	if( minOrMax_list_of_needs.trim() == '' ){
		return false;

	} else {
		return true;
	}

}






