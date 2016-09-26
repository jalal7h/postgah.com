<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function user_emailverifybeforesignup_formHiddenInput(){
	
	$c = "<input type=\"hidden\" name=\"e\" value=\"".$_REQUEST['e']."\">\n";
	$c.= "<input type=\"hidden\" name=\"h\" value=\"".$_REQUEST['h']."\">\n";
	
	return $c;
	
}

