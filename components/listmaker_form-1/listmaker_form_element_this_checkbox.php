<?

function listmaker_form_element_this_checkbox( $info ){
	
	$c.= lmfe_tnit( $info, $skip_title=true );


	$c.= $info['PreTab']."<label>\n";

	$c.= "\t".$info['PreTab']."<input type=\"".$info['type']."\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".( $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'] )."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "checked ": '' ).
		"value=\"1\" ".
		"/>\n";
	
	$c.= "\t".$info['PreTab']."<span>".$info['placeholder']."</span>\n";
	
	$c.= $info['PreTab']."</label>\n";

	return $c;

}

