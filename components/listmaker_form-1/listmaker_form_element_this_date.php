<?

function listmaker_form_element_this_date( $info ){

	$c.= lmfe_tnit( $info );

	$info['class'].= " lmfe_isDate calendar-fa";
	$info['class'] = trim($info['class']);
	
	if( function_exists('date_zero') ){
		$info['value'] = date_zero('remove', $info['value']);
	}

	$c.= $info['PreTab']."<input type=\"text\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".( $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'] )."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		"/>\n";

	return $c;
	
}

