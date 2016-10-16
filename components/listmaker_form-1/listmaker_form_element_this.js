
// 2016/10/08

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

});

