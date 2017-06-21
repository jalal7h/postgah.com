<?php

# jalal7h@gmail.com
# 2017/06/18
# 1.3

function listmaker_form_element_this_textarea( $info ){
	
	$tnit_c = lmfe_tnit( $info );
	$c.= $tnit_c;

	#
	# tinymce
	if( strstr( " ".strtolower($info['class'])." ", ' tinymce ') ){
		if(! $GLOBALS['listmaker_form_element_this_textarea_include_done'] ){
			$c = "<script src=\""._URL."/modules/tinymce/tinymce.min.js\"></script>\n".
				 "<script src=\""._URL."/modules/tinymce/tinymce-set.js\"></script>\n".
				 $c;
			$GLOBALS['listmaker_form_element_this_textarea_include_done'] = true;
		}
	}

	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$c.= "<textarea ".
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

