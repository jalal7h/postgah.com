<?

function listmaker_form_element_this_radio( $info ){
	
	#
	# if title not in tag
	$c.= lmfe_tnit( $info );

	#
	# make some `id`, if we dont have it
	if(! $info['id'] ){
		$info['id'] = "lmfe_".$info['formName']."_".$info['name'];
	}

	if(! sizeof($info['option']) ){
		return "no option defined for radio";
	
	} else foreach ($info['option'] as $id => $name) {
		$c.= $info['PreTab']."<label>\n";
		$c.= $info['PreTab'].
			"\t<input type=\"radio\" ".
			"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
			"value=\"".$id."\" ".
			( $id==$info['value'] ? "checked " : "" ).
			"/>\n";
		$c.= $info['PreTab']."\t<span>".$name."</span>\n";
		$c.= $info['PreTab']."</label>\n";
	}

	return $c;
	
}

