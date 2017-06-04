<?

# jalal7h@gmail.com
# 2016/10/16
# 1.1

function listmaker_form_element_this_float( $info ){

	$c.= lmfe_tnit( $info );
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$info['class'].= " lmfe_isNumber";
	$info['class'] = trim($info['class']);

	$c.= $info['PreTab']."<input autocomplete=\"off\" type=\"number\" step=\"0.01\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		"/>\n";

	return $c;
	
}

