<?php

# jalal7h@gmail.com
# 2017/06/23
# 1.1

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
	$c.= "<input autocomplete=\"off\" size=\"10\" max=\"".intval($info['max'])."\" max_alert=\"".__('ثبت بیش از '.$info['max'].' کلمات کلیدی مجاز نیست.')."\" type=\"text\" ".($info['TitleInTag'] ?"placeholder=\"".$info['placeholder']."\" " :'')."/>\n";
	$c.= "</span>\n";
	
	return $c;
	
}

