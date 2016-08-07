<?

function listmaker_form_element_this_name( $info ){
	
	$c.= lmfe_tnit( $info );
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$info['class'].= " lmfe_isName";
	$info['class'] = trim($info['class']);
	
	$c.= $info['PreTab']."<input type=\"".$info['type']."\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		"/>\n";
	
	return $c;
	
}

