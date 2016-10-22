
// 2016/10/22

$(document).ready(function($) {
		
	// lmfe_isNeeded
	$('.lmfe_isNeeded').closest("form").on('submit', function(e){
		$(this).find('.lmfe_isNeeded').each(function( index ) {
  			if( $(this).val()=='' || $(this).val()==0 ){
  				
  				if( $(this).prop('tagName') == 'INPUT' && $(this).prop('type') == 'hidden' ){
  					$(this).parent().find('.lmfe_catbox').addClass('lmfe_redline');
  				} else {
	  				$(this).addClass('lmfe_redline');
  					$(this).focus();
  				}

  				e.preventDefault();
  				return false;
  			}
		});
	});
	$('body').delegate('.lmfe_redline', 'keypress click', function(e) {
		$(this).removeClass('lmfe_redline');
	});

	// lmfe_more
	var lmfe_c = 0;
	$('.lmfe_more icon').on('click', function(){

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
		$('#'+lmfe_more_new_item_id+' icon').hide();
		$('#'+lmfe_more_new_item_id+' .lmfetfp').hide();
		$('#'+lmfe_more_new_item_id+' .lmfetc .lmfetc .lmfetc').html('');
		$('#'+lmfe_more_new_item_id+' .lmfetc .lmfetc select').val('');

		if( $(this).parent().hasClass('catbox') ){
			$('#'+lmfe_more_new_item_id+' input[type="hidden"]').val('0');
			var the_text = $(this).parent().find('.lmfe_catbox_c > input[type="hidden"]').attr('name');
			the_text = 'انتخاب ' + $(this).closest('form').find('input[name="'+the_text+'"]').first().closest('.lmfe_inDiv.catbox').find('.lmfe_tnit').html();
			$('#'+lmfe_more_new_item_id+' span > span').html( the_text );
		
		} else if( $(this).parent().hasClass('positionbox') ){
			$('#'+lmfe_more_new_item_id+' input[type="hidden"]').val('0');
			var the_text = $(this).parent().find('.lmfe_positionbox_c > input[type="hidden"]').attr('name');
			the_text = 'انتخاب ' + $(this).closest('form').find('input[name="'+the_text+'"]').first().closest('.lmfe_inDiv.positionbox').find('.lmfe_tnit').html();
			$('#'+lmfe_more_new_item_id+' span > span').html( the_text );
		
		}

	});

	// content_min
	$('body').delegate('.lmfe_inDiv input, .lmfe_inDiv textarea', 'keyup', function(){
		$(this).closest('form').attr( 'closed', 0 );
		lmfe_content_minOrMaxLimit_setFormState( $(this) , 'min' );
		lmfe_content_minOrMaxLimit_setFormState( $(this) , 'max' );
	});
	
	$('.lmfe_inDiv input, .lmfe_inDiv textarea').each(function(i){
		lmfe_content_minOrMaxLimit_setFormState( $(this) , 'min' );
		lmfe_content_minOrMaxLimit_setFormState( $(this) , 'max' );
	});

});


function lmfe_content_minOrMaxLimit_setFormState( ts, minOrMax ){

	// if its already closed, dont do anything
	if( ts.closest('form').attr('closed') == '1' ){
		return;
	}

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
			condition = ( val_count < the_limit_numb );
		
		} else if( minOrMax == 'max' ){
			condition = ( val_count > the_limit_numb );
		
		} else {
			return false;
		}

		ts.parent().find('> .lmfe_minOrMax > .cur > .count_of_current_'+the_limit_type).html( val_count );

		if( condition ){
			ts.closest('form').attr('closed','1');
			ts.closest('form').bind('submit',function(e){e.preventDefault();});
			minOrMax_list_of_needs_add( ts.attr('id') );
			cl('form is closed more');

		} else {
			minOrMax_list_of_needs_remove( ts.attr('id') );
			if(! minOrMax_list_of_needs_checkIfAny() ){
				ts.closest('form').attr('closed','0');
		    	ts.closest('form').unbind('submit');
				cl('form is open all');
			}
			cl('form is open one');
		}

	}

}


var minOrMax_list_of_needs = '';

function minOrMax_list_of_needs_add( the_id ){
	if( minOrMax_list_of_needs.search( the_id + ' ' ) == -1 ){
		minOrMax_list_of_needs = minOrMax_list_of_needs + the_id + ' ';
	}
	cl( 'remove ' + the_id + ';' + minOrMax_list_of_needs );
}

function minOrMax_list_of_needs_remove( the_id ){
	minOrMax_list_of_needs = minOrMax_list_of_needs.replace( the_id+' ' , '' );
	cl( 'remove ' + the_id + '; needs :' + minOrMax_list_of_needs );
}

function minOrMax_list_of_needs_checkIfAny(){

	if( minOrMax_list_of_needs.trim() == '' ){
		return false;

	} else {
		return true;
	}

}






