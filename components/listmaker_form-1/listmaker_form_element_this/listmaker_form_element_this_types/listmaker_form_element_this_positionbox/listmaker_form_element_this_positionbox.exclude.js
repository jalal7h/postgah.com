/* 2017/07/29 */

var positionjson_head = '';

function positionjson_set_content( position_value ){
jQuery(document).ready(function($) {
	
	var content = '';
	var obj = $.parseJSON( positionjson[ position_value ] );

	content+= '<span class=\"head\">';

	if( position_value > 0 ){
		var lang_back = $('.lmfe_positionbox_c.selected .lmfe_positionbox').attr('lang_back');
		content+= '<span class="up" parent="'+positionjson_get_parent(position_value)+'" >'+lang_back+'</span>';
	}
	
	if( position_value == 0 ){
		// ...
		var nosh = $('.lmfe_positionbox_c.selected input[type="hidden"]').attr("name");
		content+= $('.lmfe_positionbox_c.selected').closest('form').find('input[name="'+nosh+'"]').first().parent().parent().find('.lmfe_tnit').html();
	}

	if( position_value > 0 ){
		content+= '<span class="title_serial">' + positionjson_get_title_serial( position_value ) + '</span>';
	}

	content+= '<span class="btn btn-primary btn-xs the_save_button">تایید</span>';
	content+= '</span>';

	for( var prop in obj ){
		// console.log("obj." + prop + " = " + obj[prop]);
		content+= '<span class="r" rel="' + prop + '" >' + obj[prop] + '</span>';
	}

	$('.positionjson_hitbox_c').html( content );

});
}

jQuery(document).ready(function($) {
	
	// opens the hitbox of selecting position and sub position
	$('body').delegate('.lmfe_positionbox_c .lmfe_positionbox', 'click', function() {
		
		var lang_select = $(this).attr('lang_select');

		$('.lmfe_positionbox_c').removeClass('selected');
		$(this).parent().addClass('selected');
		
		// ba click ruye section, bere be 0
		$(this).parent().find('input[type="hidden"]').val('0');
		$(this).parent().find('.lmfe_positionbox').html( $(this).parent().parent().find('.lmfe_tnit').html() );

		position_value = 0;
		
		if (typeof positionjson == "undefined" || !(positionjson instanceof Array)) {
			cl( 'array positionjson is NOT defined' );
		
		} else {
			
			if( typeof positionjson[ position_value ] === 'undefined' ){
				cl('index ' + position_value + ' in positionjson is NOT defined' );
			
			} else {
				hitbox( '<div class="positionjson_hitbox_c"></div>' , '80%', 'auto', 'lmfe_positionbox_c_hitbox' );
				positionjson_set_content( position_value );
			}

		}

	});


	$('body').delegate('.positionjson_hitbox_c > span.r', 'click', function() {

		var position_value = $(this).attr('rel');
		var position_name = positionjson_get_title_serial( position_value );
		
		hdn_inp = $('.lmfe_positionbox_c.selected input[type="hidden"]');
		hdn_inp.val( position_value );

		$('.lmfe_positionbox_c.selected .lmfe_positionbox').html( position_name );

		// get form name, and element name :
		formName = $('.lmfe_positionbox_c.selected').closest('form').attr('name');
		elemName = $('.lmfe_positionbox_c.selected').find('input[type="hidden"]').attr('name');
		elemFuncName = 'lmfetpb_EFN_'+formName+'_'+elemName;

		// extra before
		if(typeof lmfetp_extra_before == 'function') { 
			cl('trying to run lmfetp_extra_before');
			lmfetp_extra_before( position_value );
		} else {
			cl('func lmfetp_extra_before does not exits.');			
		}

		if( function_exits(elemFuncName) ){
			cl('trying to run '+elemFuncName);
			window[elemFuncName]( position_value );
		
		} else {
			cl( 'func '+elemFuncName+' does not exists.' );
		}

		// extra after
		if(typeof lmfetp_extra_after == 'function') { 
			cl('trying to run lmfetp_extra_after');
			lmfetp_extra_after( position_value );
		}

		// agar sub pos select shod. - age chizi select shod k sub barash tarif nashode. kadr ro beband.
		if( typeof positionjson[ position_value ] === 'undefined' ){
			
			// $('.lmfe_positionbox_c.selected input[type="hidden"]').val( position_value );
			// $('.lmfe_positionbox_c.selected .lmfe_positionbox').html( '<nobr>' + position_name + '</nobr>' );
			$('.lmfe_positionbox_c.selected').removeClass('selected');
			
			dehitbox_do();

			if( hdn_inp.attr('rrqs') == 1 ){
				hdn_inp.trigger( "change" );
			}
		
		} else {
			positionjson_set_content( $(this).attr('rel') );
		}

	});


	$('body').delegate('div.positionjson_hitbox_c span.head .up', 'click', function() {
		positionjson_set_content( $(this).attr('parent') );
	});


	$('body').delegate('div.positionjson_hitbox_c span.head .the_save_button', 'click', function() {
		dehitbox_do();
		hdn_inp = $('.lmfe_positionbox_c.selected input[type="hidden"]');
		if( hdn_inp.attr('rrqs') == 1 ){
			hdn_inp.trigger( "change" );
		}
	});


});


function positionjson_get_parent( id ){
	
	for( var i in positionjson ){
		var obj = $.parseJSON( positionjson[ i ] );
		for( var j in obj ){
			if( j == id ){
				return i;
			}
		}
	}

	return 0;

}

function positionjson_get_title_serial( id ){
	
	var title_serial = '';

	while( id > 0 ){
		if( title_serial != '' ){
			title_serial = positionjson_get_title(id) + ' » ' + title_serial;
		} else {
			title_serial = positionjson_get_title(id);
		}
		id = positionjson_get_parent( id );
	}

	return title_serial;

}


function positionjson_get_title( id ){

	for( var i in positionjson ){
		var obj = $.parseJSON( positionjson[ i ] );
		for( var j in obj ){
			if( j == id ){
				return obj[j];
			}
		}
	}

	return 0;

}













