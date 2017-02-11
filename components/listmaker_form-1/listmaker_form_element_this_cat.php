<?

# jalal7h@gmail.com
# 2017/02/11
# 2.0

function listmaker_form_element_this_cat( $info ){
	
	# 
	# cat name is not defined
	if(! $cat_name = $info['cat_name'] ){
		echo "no cat defined !";
		return false;
	
	#
	# this cat have subcat
	} else if( cat_detail($info['cat_name'])['sub'] ){
		echo "sub is enabled";
		return false;
	}

	$cat_options = cat_display($cat_name);

	$c.= lmfe_tnit( $info );

	$c.= "<select name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '')."\" id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['content_min'] ? "content_min=\"".$info['content_min']."\" " : "" ).
		( $info['content_max'] ? "content_max=\"".$info['content_max']."\" " : "" ).
		">\n";

	if(! $info['value'] ){
		$c.= "<option value=\"\" ></option>\n";
	}

	if( sizeof($cat_options) ){
		foreach ($cat_options as $cat_id => $cat_name ) {
			$c.= "<option value=\"$cat_id\" ".( $info['value'] == $cat_id ? "selected" : '' )." >$cat_name</option>\n";
		}
	}

	$c.= "</select>\n";
	
	return $c;

}


//( $info['value'] ? "value=\"".$info['value']."\" " : '' ).






