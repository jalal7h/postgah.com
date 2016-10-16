<?

# jalal7h@gmail.com
# 2016/10/08
# 1.0

function listmaker_form_element_this_catbox( $info ){
	
	if(! $info['cat_name'] ){
		echo "no cat defined !";
		return false;
	}

	$c.= lmfe_tnit( $info );

	// list e cat ha besurat e json
	js_enqueue( _URL."/?do_action=listmaker_form_element_this_catbox_preload&cat_name=".str_enc($info['cat_name'])."&nc=".date("md") );
	js_enqueue( 'listmaker_form', 'listmaker_form_element_this_catbox' );

	if(! $info['value'] ){
		$cat_name = "انتخاب ".$info['placeholder'];
	} else {
		$cat_name = catjson_get_title_serial( $info['value'] );	
	}

	$c.= "
	<span class='lmfe_catbox_c' >
		<input 
			".($info['isNeeded']?'class="lmfe_isNeeded"':'')." 
			type=\"hidden\" 
			name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" 
			value=\"".( $info['value'] ? $info['value'] : '0' )."\" 
			/>
		<span class='lmfe_catbox' >".$cat_name."</span>
	</span>";
	
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








