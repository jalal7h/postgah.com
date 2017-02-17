<?

# jalal7h@gmail.com
# 2017/02/11
# 1.0

function listmaker_form_element_this_count( $info ){

	$c.= lmfe_tnit( $info );
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$info['class'].= " lmfe_isNumber";
	$info['class'] = trim($info['class']);

	$c.= $info['PreTab']."<input autocomplete=\"off\" type=\"text\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']." numeric\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		"/> ".__('عدد')."\n";

	return $c;
	
}

