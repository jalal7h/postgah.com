<?php

# jalal7h@gmail.com
# 2017/07/30
# 1.5

function listmaker_form_element_this_catbox( $info ){

	if(! $info['cat_name'] ){
		ed();
	}

	$c.= lmfe_tnit( $info );

	// list e cat ha besurat e json
	add_jscode_footer( listmaker_form_element_this_catbox_preload( $info['cat_name'] ) );
	add_js_footer( bysideme().'/listmaker_form_element_this_catbox.exclude.js' );
	
	if(! $info['value'] ){
		if(! $info['placeholder'] ){
			$cat_name = __("انتخاب");
		} else {
			$cat_name = $info['placeholder'];
		}
	} else {
		$cat_name = catjson_get_title_serial( $info['value'] );	
	}

	$cat_value = ( $info['value'] ? $info['value'] : '0' );

	$c.= "
	<span class='lmfe_catbox_c' ccf='".( $info['ccf'] ? '1' : '0' )."' cat_name=\"".$info['cat_name']."\" >
		<input 
			".($info['isNeeded']?'class="lmfe_isNeeded"':'')." 
			type=\"hidden\" 
			name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" 
			value=\"".$cat_value."\" 
			".( $info['etc'] ? $info['etc']." " : '' )."
			/>
		<span class='lmfe_catbox ".$info['class']."' lang_select='' lang_back='".__('بازگشت')."' >".$cat_name."</span>
	</span>";
	
	if( is_component('catcustomfield') and $info['ccf']==true ){
		if(! $info['ArrayInput'] ){
			$cat_name = $info['cat_name'];
			$item_table = $GLOBALS['listmaker_form-formTable'];
			$item_id = $GLOBALS['listmaker_form-rw']['id'];
			$c.= catcustomfield_console( $cat_name, $item_table, $item_id, $cat_value );
		}
	}

	return $c;

}


function catjson_get_title_serial( $id ){

	while( $id > 0 ){
		
		if( $title_serial != '' ){
			$title_serial = cat_translate($id).' » '.$title_serial;
		
		} else {
			$title_serial = cat_translate($id);
		}

		$id = table('cat', $id, 'parent');

	}

	return $title_serial;

}








