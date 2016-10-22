<?

# jalal7h@gmail.com
# 2016/10/19
# 1.1

function listmaker_form_element_this_textarea( $info ){
	
	$tnit_c = lmfe_tnit( $info );
	$c.= $tnit_c;

	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$c.= $info['PreTab']."<textarea ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $info['content_min'] ? "content_min=\"".$info['content_min']."\" " : "" ).
		( $info['content_max'] ? "content_max=\"".$info['content_max']."\" " : "" ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : '' ).
		">".$info['value']."</textarea>\n";

	$minOrMax_c = listmaker_form_element_content_minOrMax_table( $info );
	
	
	if( $tnit_c and $minOrMax_c ){
		$c = $c.'<span class="lmfe_tnit" ></span>'.$minOrMax_c;
	
	} else {
		$c = $c.$minOrMax_c;
	}
	
	
	return $c;
	
}

