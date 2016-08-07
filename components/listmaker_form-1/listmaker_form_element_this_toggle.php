<?

function listmaker_form_element_this_toggle( $info ){

	if(! $info['TitleInTag'] ){
		$c.= $info['PreTab']."<span class=\"lmfe_tnit\">".$info['placeholder']."</span>\n";
	} else if( $info['inDiv'] ){
		$c.= $info['PreTab']."<span class=\"lmfe_tnit\"></span>\n";		
	}

	$c.= $info['PreTab']."<span>\n";

	$c.= "\t".$info['PreTab']."<input type=\"jtoggle\" ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"value=\"".( $info['value'] ? '1': '0' )."\" ".
		"/>\n";
	
	if( $info['TitleInTag'] ){
		$c.= "\t".$info['PreTab']."<span>".$info['placeholder']."</span>\n";
	}

	$c.= $info['PreTab']."</span>\n";

	return $c;
}

