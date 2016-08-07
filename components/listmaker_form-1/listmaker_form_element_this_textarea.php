<?

function listmaker_form_element_this_textarea( $info ){
	
	$c.= lmfe_tnit( $info );

	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$c.= $info['PreTab']."<textarea type=\"".$info['type']."\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		">".$info['value']."</textarea>\n";

	return $c;
	
}

