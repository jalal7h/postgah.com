<?php

# jalal7h@gmail.com
# 2017/07/30
# 1.3

function listmaker_form_element_this_positionbox( $info ){
// echo $info['class'];die();
	if(! sizeof($GLOBALS['position_config']) ){
		e();

	} else {

		$c.= lmfe_tnit( $info );

		// list e position ha besurat e json
		add_jscode_footer( listmaker_form_element_this_positionbox_preload() );
		add_js_footer( bysideme().'/listmaker_form_element_this_positionbox.exclude.js' );

		if(! $info['value'] ){
			if(! $info['placeholder'] ){
				$position_name = __("انتخاب");
			} else {
				$position_name = $info['placeholder'];
			}
		} else {
			$position_name = positionjson_get_title_serial( $info['value'] );	
		}

		$info['class'] = trim(str_replace( 'lmfe_isNeeded', '', $info['class']));
		$info['class'].= ' lmfe_positionbox';

		$c.= "
		<span class='lmfe_positionbox_c' >
			<input 
				".($info['isNeeded']?'class="lmfe_isNeeded"':'')." 
				type=\"hidden\" 
				name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" 
				value=\"".( $info['value'] ? $info['value'] : '0' )."\"
				".( $info['etc'] ? $info['etc']." " : '' )."
				/>
			<span class='".$info['class']."' lang_select='' lang_back='".__('بازگشت')."' >".$position_name."</span>
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








