<?

# jalal7h@gmail.com
# 2017/02/11
# 1.0

function listmaker_form_element_this_cost( $info ){

	$c.= lmfe_tnit( $info );
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$info['class'].= " lmfe_isNumber";
	$info['class'] = trim($info['class']);

	if( $unit = setting('money_unit') ){
		if( strstr( $unit , '%%' ) ){
			$unit = explode('%%', $unit);
			$unit = $unit[1];
		}
		$unit = " ".trim($unit);
	}

	$c.= "<input autocomplete=\"off\" type=\"text\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']." numeric\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		"/><span class=\"lmfe_cost_unit\">".$unit."</span>\n";

	return $c;
	
}

