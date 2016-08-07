<?

function listmaker_form_element_this_select( $info ){
	
	#
	# if title not in tag
	$c.= lmfe_tnit( $info );

	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	#
	# make some `id`, if we dont have it
	if(! $info['id'] ){
		$info['id'] = "lmfe_".$info['formName']."_".$info['name'];
	}

	$c.= $info['PreTab']."<select ".
		"name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		"id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		">\n";

	if( $info['TitleInTag'] ){
		$c.= $info['PreTab']."\t<option value=\"\">".$info['placeholder']."</option>\n";
	}

	$info['option'] = str_replace( "</option><option", "</option>\n".$info['PreTab']."\t<option", $info['option'] );

	if( is_array($info['option']) ){
		foreach ($info['option'] as $id => $name) {
			$c.= $info['PreTab']."\t<option value=\"".$id."\">".$name."</option>\n";
		}
	} else {
		$c.= $info['PreTab']."\t".$info['option']."\n";
	}

	$c.= $info['PreTab']."</select>\n";

	if( $info['value'] ){
		$c.= $info['PreTab']."<script>document.getElementById(\"".$info['id']."\").value = \"".$info['value']."\";</script>\n";
	}

	return $c;
}

