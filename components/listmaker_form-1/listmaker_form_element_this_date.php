<?

# jalal7h@gmail.com
# 2016/12/24
# 1.1

function listmaker_form_element_this_date( $info ){

	$c.= lmfe_tnit( $info );

	$info['class'].= " lmfe_isDate calendar-".( lang_dir == 'ltr' ? 'en' : lang_code );
	$info['class'] = trim($info['class']);
	
	if( function_exists('date_zero') ){
		$info['value'] = date_zero('remove', $info['value']);
	}

	if( lang_dir == 'ltr' ){
		$input_type = 'date';
	} else {
		$input_type = 'text';
	}

	$c.= $info['PreTab']."<input type=\"$input_type\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".( $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'] )."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		"/>\n";

	return $c;
	
}

