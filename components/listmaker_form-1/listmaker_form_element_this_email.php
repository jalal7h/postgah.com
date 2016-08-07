<?

function listmaker_form_element_this_email( $info ){
	
	$c.= lmfe_tnit( $info );

	$c.= $info['PreTab']."<input type=\"".$info['type']."\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".( $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'] )."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		"/>\n";

	return $c;
	
}

