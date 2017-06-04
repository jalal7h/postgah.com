<?

function listmaker_form_element_this_hidden( $info ){
	
	$c.= lmfe_tnit( $info );

	$c.= $info['PreTab']."<input type=\"".$info['type']."\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		"/>\n";

	return $c;

}

