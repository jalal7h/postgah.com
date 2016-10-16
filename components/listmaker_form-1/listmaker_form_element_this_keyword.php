<?

# jalal7h@gmail.com
# 2016/10/16
# 1.0

// it does not support * and + yet

function listmaker_form_element_this_keyword( $info ){
	
	$c.= lmfe_tnit( $info );
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$info['class'].= "lmfe_isKeyword";
	$info['class'] = trim($info['class']);

	$c.= "<span id=\"$id\" class=\"".$info['class']."\" ".$info['etc']." />\n";
	$c.= "<input type=\"hidden\" name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" value=\"".$info['value']."\" />\n";
	$c.= "<span class=\"kw_w\">...</span>";
	$c.= "<input size=\"10\" type=\"text\" ".($info['TitleInTag'] ?"placeholder=\"".$info['placeholder']."\" " :'')."/>\n";
	$c.= "</span>\n";
	
	return $c;
	
}

