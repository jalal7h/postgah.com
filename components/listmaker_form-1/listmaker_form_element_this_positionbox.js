
/*print*/
/* 2016/10/15 */

var positionjson_head = '';

function positionjson_set_content( position_value ){
jQuery(document).ready(function($) {
	
	var content = '';
	var obj = $.parseJSON( positionjson[ position_value ] );

	content+= '<span class=\"head\">';

	if( position_value > 0 ){
		content+= '<span class="up" parent="'+positionjson_get_parent(position_value)+'" >بازگشت</span>';
	}
	
	if( position_value == 0 ){
		var nosh = $('.lmfe_positionbox_c.selected input[type="hidden"]').attr("name");
		content+= $('.lmfe_positionbox_c.selected').closest('form').find('input[name="'+nosh+'"]').first().parent().parent().find('.lmfe_tnit').html();
	}

	if( position_value > 0 ){
		content+= '<span class="title_serial">' + positionjson_get_title_serial( position_value ) + '</span>';
	}

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
		
		$('.lmfe_positionbox_c').removeClass('selected');
		$(this).parent().addClass('selected');
		
		position_value = 0;
		
		if (typeof positionjson == "undefined" || !(positionjson instanceof Array)) {
			cl( 'array positionjson is NOT defined' );
		
		} else {
			
			if( typeof positionjson[ position_value ] === 'undefined' ){
				cl('index ' + position_value + ' in positionjson is NOT defined' );
			
			} else {
				cl('sss');
				hitbox( '<div class="positionjson_hitbox_c"></div>' , '600', 'auto' );
				positionjson_set_content( position_value );

			}

		}

	});


	$('body').delegate('.positionjson_hitbox_c > span.r', 'click', function() {

		var position_value = $(this).attr('rel');
		var position_name = positionjson_get_title_serial( position_value );
		
		if( typeof positionjson[ position_value ] === 'undefined' ){
			$('.lmfe_positionbox_c.selected input[type="hidden"]').val( position_value );
			$('.lmfe_positionbox_c.selected .lmfe_positionbox').html( '<nobr>' + position_name + '</nobr>' );
			$('.lmfe_positionbox_c.selected').removeClass('selected');
			dehitbox_do();
		
		} else {
			positionjson_set_content( $(this).attr('rel') );
		}

	});

	$('body').delegate('div.positionjson_hitbox_c span.head .up', 'click', function() {
		positionjson_set_content( $(this).attr('parent') );
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













