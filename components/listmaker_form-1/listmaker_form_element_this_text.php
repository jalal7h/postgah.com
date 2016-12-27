<?

# jalal7h@gmail.com
# 2016/12/27
# 1.2

function listmaker_form_element_this_text( $info ){
	
	$tnit_c = lmfe_tnit( $info );
	$c.= $tnit_c;
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$c.= $info['PreTab']."<input autocomplete=\"off\" type=\"".$info['type']."\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		( $info['content_min'] ? "content_min=\"".$info['content_min']."\" " : "" ).
		( $info['content_max'] ? "content_max=\"".$info['content_max']."\" " : "" ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : 
			// ( $info['placeholder'] ? "placeholder=\"".$info['placeholder']."\" " : '' )
			""
		).
		"/>\n";

	$minOrMax_c = listmaker_form_element_content_minOrMax_table( $info );


	if( $tnit_c and $minOrMax_c ){
		$c = $c.'<span class="lmfe_tnit" ></span>'.$minOrMax_c;
	
	} else {
		$c = $c.$minOrMax_c;
	}


	return $c;

}




