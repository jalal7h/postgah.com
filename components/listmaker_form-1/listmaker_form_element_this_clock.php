<?

# jalal7h@gmail.com
# 2016/05/14
# Version 1.0

function listmaker_form_element_this_clock( $info ){

	$c.= lmfe_tnit( $info );

	$c.= $info['PreTab']."<input type=\"text\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".( $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'] )."\" ".
		"class=\"clockpicker ".$info['class']."\" ".
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		"/>\n";

	return $c;
	
}

