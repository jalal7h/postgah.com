<?

# jalal7h@gmail.com
# 2017/01/20
# 1.1

function listmaker_form_element_this_submit( $info ){
	
	$c.= lmfe_tnit( $info );

	$info['class'].= " btn btn-primary";
	$info['class'] = trim($info['class']);
	
	$c.= $info['PreTab']."<input type=\"".$info['type']."\" ".
		"id=\"".( $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['type'] )."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['name'] ? "value=\"".$info['name']."\" " : '' ).
		"/>\n";

	if( qpop('listmaker_form_open__target_self') ){
		$c.= '<span class="lmfe_submit_prompt">'.__('تغییرات ثبت شد.').'</span>'."\n";
	}

	return $c;
	
}

