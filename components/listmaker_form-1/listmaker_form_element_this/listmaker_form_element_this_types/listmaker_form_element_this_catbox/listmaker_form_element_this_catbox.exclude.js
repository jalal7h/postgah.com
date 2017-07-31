/*2017/07/01*/

var catjson_head = '';

function catjson_set_content( cat_value ){
jQuery(document).ready(function($) {
	
	var content = '';
	var obj = $.parseJSON( catjson[ cat_value ] );

	content+= '<span class=\"head\">';

	if( cat_value > 0 ){
		var lang_back = $('.lmfe_catbox_c.selected .lmfe_catbox').attr('lang_back');
		content+= '<span class="up" parent="'+catjson_get_parent(cat_value)+'" >'+lang_back+'</span>';
	}
	
	if( cat_value == 0 ){
		// content+= $('.lmfe_catbox_c.selected').parent().find('.lmfe_tnit').html();
		var nosh = $('.lmfe_catbox_c.selected input[type="hidden"]').attr("name");
		content+= $('.lmfe_catbox_c.selected').closest('form').find('input[name="'+nosh+'"]').first().parent().parent().find('.lmfe_tnit').html();
	}

	if( cat_value > 0 ){
		content+= '<span class="title_serial">' + catjson_get_title_serial( cat_value ) + '</span>';
	}

	content+= '<span class="btn btn-primary btn-xs the_save_button">تایید</span>';
	content+= '</span>';

	for( var prop in obj ){
		// console.log("obj." + prop + " = " + obj[prop]);
		content+= '<span class="r" rel="' + prop + '" >' + obj[prop] + '</span>';
	}
	
	$('.catjson_hitbox_c').html( content );
	
});
}

jQuery(document).ready(function($) {
	
	// opens the hitbox of selecting cat and sub cat
	$('body').delegate('.lmfe_catbox_c .lmfe_catbox', 'click', function() {

		var lang_select = $(this).attr('lang_select');

		$('.lmfe_catbox_c').removeClass('selected');
		$(this).parent().addClass('selected');

		// ba click ruye section, bere be 0
		$(this).parent().find('input[type="hidden"]').val('0');
		$(this).parent().find('.lmfe_catbox').html( $(this).parent().parent().find('.lmfe_tnit').html() );

		cat_value = 0;
		
		if (typeof catjson == "undefined" || !(catjson instanceof Array)) {
			cl( 'array catjson is NOT defined' );
		
		} else {
			
			if( typeof catjson[ cat_value ] === 'undefined' ){
				cl('index ' + cat_value + ' in catjson is NOT defined' );
			
			} else {
				hitbox( '<div class="catjson_hitbox_c"></div>' , '600', 'auto', 'lmfe_catbox_c_hitbox' );
				catjson_set_content( cat_value );
			}

		}

	});


	$('body').delegate('.catjson_hitbox_c > span.r', 'click', function() {
		
		var cat_value = $(this).attr('rel');
		var cat_title = catjson_get_title_serial( cat_value );

		hdn_inp = $('.lmfe_catbox_c.selected input[type="hidden"]');
		hdn_inp.val( cat_value );

		$('.lmfe_catbox_c.selected input[type="hidden"]').val( cat_value );
		$('.lmfe_catbox_c.selected .lmfe_catbox').html( cat_title );
		
		// get form name, and element name :
		formName = $('.lmfe_catbox_c.selected').closest('form').attr('name');
		elemName = $('.lmfe_catbox_c.selected').find('input[type="hidden"]').attr('name');
		elemFuncName = 'lmfetcb_EFN_'+formName+'_'+elemName;

		// extra before
		if(typeof lmfetc_extra_before == 'function') { 
			cl('trying to run lmfetc_extra_before');
			lmfetc_extra_before( cat_value );
		}

		if( function_exits(elemFuncName) ){
			cl('trying to run '+elemFuncName);
			window[elemFuncName]( cat_value );
		
		} else {
			cl( 'func '+elemFuncName+' does not exists.' );
		}

		/** load the ccf - start *************************/
		// catcustomfield console
		cat_name = $('.lmfe_catbox_c.selected').attr('cat_name');
		if( $('.lmfe_catbox_c.selected ').attr('ccf') == 1 ){
			if(typeof catcustomfield_console == 'function') { 
				cl('trying to run catcustomfield_console');
				catcustomfield_console( cat_name, cat_value /* as cat_id */ ); 
			}
		}
		/** load the ccf - end *************************/

		// extra after
		if(typeof lmfetc_extra_after == 'function') { 
			cl('trying to run lmfetc_extra_after');
			lmfetc_extra_after( cat_value );
		}


		if( typeof catjson[ cat_value ] === 'undefined' ){
			$('.lmfe_catbox_c.selected').removeClass('selected');
			
			dehitbox_do();

			if( hdn_inp.attr('rrqs') == 'a' ){
				hdn_inp.trigger( "change" );
			}

		
		} else {
			catjson_set_content( $(this).attr('rel') );
		}

	});


	$('body').delegate('div.catjson_hitbox_c span.head .up', 'click', function() {
		catjson_set_content( $(this).attr('parent') );
	});

	$('body').delegate('div.catjson_hitbox_c span.head .the_save_button', 'click', function() {
		dehitbox_do();
		hdn_inp = $('.lmfe_catbox_c.selected input[type="hidden"]');
		if( hdn_inp.attr('rrqs') == 'a' ){
			hdn_inp.trigger( "change" );
		}
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







