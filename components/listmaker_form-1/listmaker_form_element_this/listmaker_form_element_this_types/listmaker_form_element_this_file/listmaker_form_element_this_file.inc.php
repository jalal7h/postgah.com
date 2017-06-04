<?

function listmaker_form_element_this_file( $info ){
	
	#
	# fix accept
	if(! $info['accept'] ){
		$info['accept'] = "image/*";
	}

	#
	# its an array input
	if( $info['ArrayInput'] ){
		$c.= $info['PreTab']."\t<input type=\"hidden\" name=\"ArrayInput_".$info['name']."\" value=\"1\" />";
	}

	#
	# soft multi input
	if( $info['ArrayInput'] ){
		$c.= listmaker_form_element_this_file_ArrayOfOldInput( $info );

	#
	# hard single input
	} else {
		
		$c.= listmaker_form_element_this_file_thisInput( $info, $allowMoreButton=true, 
			[
				'table'=>$info['formTable'],
				'id'=>intval($_REQUEST['id']),
				'column'=>$info['name']
			]
		);

	}
	
	return $c;

}







