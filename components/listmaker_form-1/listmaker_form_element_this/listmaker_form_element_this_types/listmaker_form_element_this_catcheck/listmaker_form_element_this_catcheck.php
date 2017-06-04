<?

# jalal7h@gmail.com
# 2017/02/11
# 2.0

function listmaker_form_element_this_catcheck( $info ){
	
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

	$info['class'] = trim( "list " . $info['class'] );

	$c.= "<div class=\"".$info['class']."\"" . ( $info['etc'] ? " ".$info['etc'] : '' ) . ">\n";
	$c.= "<input type=\"hidden\" name=\"".$info['name']."\" value=\"".$info['value']."\" />";

	#
	# the value
	if( $info['value'] ){
		$info['value'] = explode( '_', $info['value'] );
	}

	if( sizeof($cat_options) ){
		foreach ($cat_options as $cat_id => $cat_name ) {
			if( is_array($info['value']) and sizeof($info['value']) and in_array( $cat_id, $info['value'] ) ){
				$if_checked = "checked";
			} else {
				$if_checked = "";
			}
			$c.= "<label><input type=\"checkbox\" cat_id=\"".$cat_id."\" $if_checked />$cat_name</label>\n";
		}
	}

	$c.= "</div>\n";
	
	return $c;

}



