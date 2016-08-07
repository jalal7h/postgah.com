<?

function listmaker_form_element_this_submit( $info ){
	
	$c.= lmfe_tnit( $info );

	$info['class'].= " submit_button";
	$info['class'] = trim($info['class']);
	
	$c.= $info['PreTab']."<input type=\"".$info['type']."\" ".
		"id=\"".( $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['type'] )."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['name'] ? "value=\"".$info['name']."\" " : '' ).
		"/>\n";

	return $c;
	
}

