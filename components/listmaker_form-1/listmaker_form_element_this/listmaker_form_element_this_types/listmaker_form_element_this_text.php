<?php

# jalal7h@gmail.com
# 2017/06/23
# 1.4

function listmaker_form_element_this_text( $info ){
	
	$tnit_c = lmfe_tnit( $info );
	$c.= $tnit_c;
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	if( !$info['moreButton'] and $info['moreButton_icon'] ){
		$removeButton_needed = true;
	}

	if( $removeButton_needed ){
		$info['class'].= " removeButton";
	}

	$info['class'] = trim($info['class']);

	$c.= $info['PreTab']."<input autocomplete=\"new-password\" type=\"".$info['type']."\" ".
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

	if( $removeButton_needed ){
		$c.= "<remove></remove>";
	}

	$minOrMax_c = listmaker_form_element_content_minOrMax_table( $info );

	if( $tnit_c and $minOrMax_c ){
		$c = $c.'<br><span class="lmfe_tnit" ></span>'.$minOrMax_c;
	
	} else {
		$c = $c.$minOrMax_c;
	}


	return $c;

}




