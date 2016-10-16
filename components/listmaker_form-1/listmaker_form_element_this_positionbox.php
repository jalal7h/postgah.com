<?

# jalal7h@gmail.com
# 2016/10/16
# 1.0

function listmaker_form_element_this_positionbox( $info ){

	if(! sizeof($GLOBALS['position_config']) ){
		e( __FUNCTION__, __LINE__ );

	} else {

		$c.= lmfe_tnit( $info );

		// list e position ha besurat e json
		js_enqueue( _URL."/?do_action=listmaker_form_element_this_positionbox_preload&nc=".date("md") );
		js_enqueue( 'listmaker_form-1', 'listmaker_form_element_this_positionbox' );

		if(! $info['value'] ){
			$position_name = "انتخاب ".$info['placeholder'];
		} else {
			$position_name = positionjson_get_title_serial( $info['value'] );	
		}

		$c.= "
		<span class='lmfe_positionbox_c' >
			<input 
				".($info['isNeeded']?'class="lmfe_isNeeded"':'')." 
				type=\"hidden\" 
				name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" 
				value=\"".( $info['value'] ? $info['value'] : '0' )."\" 
				/>
			<span class='lmfe_positionbox' >".$position_name."</span>
		</span>";
		
		return $c;
	}
	
}


function positionjson_get_title_serial( $id ){

	while( 1 ){

		if( $id == 0 ){
			break;

		} else if(! $rw = table('position', $id) ){
			break;
		
		} else if(! $rw['name'] ){
			continue;

		} else if(! $title_serial ){
			$title_serial = $rw['name'];
		
		} else {
			$title_serial = $rw['name'].' » '.$title_serial;
		}

		$id = $rw['parent'];

	}

	return $title_serial;

}








