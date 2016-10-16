
/*print*/
/* 2016/10/15 */

var catjson_head = '';

function catjson_set_content( cat_value ){
jQuery(document).ready(function($) {
	
	var content = '';
	var obj = $.parseJSON( catjson[ cat_value ] );

	content+= '<span class=\"head\">';

	if( cat_value > 0 ){
		content+= '<span class="up" parent="'+catjson_get_parent(cat_value)+'" >بازگشت</span>';
	}
	
	if( cat_value == 0 ){
		content+= $('.lmfe_catbox_c.selected').parent().find('.lmfe_tnit').html();
		var nosh = $('.lmfe_catbox_c.selected input[type="hidden"]').attr("name");
		content+= $('.lmfe_catbox_c.selected').closest('form').find('input[name="'+nosh+'"]').first().parent().parent().find('.lmfe_tnit').html();

	}

	if( cat_value > 0 ){
		content+= '<span class="title_serial">' + catjson_get_title_serial( cat_value ) + '</span>';
	}

	content+= '</span>';


	for( var prop in obj ){
		// console.log("obj." + prop + " = " + obj[prop]);
		content+= '<span class="r" rel="' + prop + '" >' + obj[prop] + '</span>';
	}

	$('.catjson_hitbox_c').html( content );

});
}

jQuery(document).ready(function($) {
	
	$('body').delegate('.lmfe_catbox_c .lmfe_catbox', 'click', function() {

		$('.lmfe_catbox_c').removeClass('selected');
		$(this).parent().addClass('selected');

		cat_value = 0;
		
		if (typeof catjson == "undefined" || !(catjson instanceof Array)) {
			cl( 'array catjson is NOT defined' );
		
		} else {
			
			if( typeof catjson[ cat_value ] === 'undefined' ){
				cl('index ' + cat_value + ' in catjson is NOT defined' );
			
			} else {

				hitbox( '<div class="catjson_hitbox_c"></div>' , '600', 'auto' );
				catjson_set_content( cat_value );

			}

		}

	});


	$('body').delegate('.catjson_hitbox_c > span.r', 'click', function() {
		
		var cat_value = $(this).attr('rel');
		// var cat_name = $(this).html();
		var cat_name = catjson_get_title_serial( cat_value );

		if( typeof catjson[ cat_value ] === 'undefined' ){
			// cl('un');
			$('.lmfe_catbox_c.selected input[type="hidden"]').val( cat_value );
			$('.lmfe_catbox_c.selected .lmfe_catbox').html( '<nobr>' + cat_name + '</nobr>' );
			$('.lmfe_catbox_c.selected').removeClass('selected');
			dehitbox_do();
		
		} else {
			catjson_set_content( $(this).attr('rel') );
		}

	});


	$('body').delegate('div.catjson_hitbox_c span.head .up', 'click', function() {
		catjson_set_content( $(this).attr('parent') );
	});


});


function catjson_get_parent( id ){
	
	for( var i in catjson ){
		var obj = $.parseJSON( catjson[ i ] );
		for( var j in obj ){
			if( j == id ){
				return i;
			}
		}
	}

	return 0;

}

function catjson_get_title_serial( id ){
	
	var title_serial = '';

	while( id > 0 ){
		if( title_serial != '' ){
			title_serial = catjson_get_title(id) + ' » ' + title_serial;
		} else {
			title_serial = catjson_get_title(id);
		}
		id = catjson_get_parent( id );
	}

	return title_serial;

}


function catjson_get_title( id ){

	for( var i in catjson ){
		var obj = $.parseJSON( catjson[ i ] );
		for( var j in obj ){
			if( j == id ){
				return obj[j];
			}
		}
	}

	return 0;

}







