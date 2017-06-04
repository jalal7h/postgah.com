<?

# pre : database information about the old value

function listmaker_form_element_this_file_thisInput( $info, $allowMoreButton=true, $pre=null ){

	if( $info['moreButton'] ){
		
		#
		# 
		if(! $info['inDiv'] ){
			$c.= "<span class=\"lmfe_more_c\">\n";
		}
		
		#
		# controlling the order of array of input tags , in ArrayInput mode.
		$c.= $info['PreTab']."\t<input type=\"hidden\" name=\"".$info['name']."_in_table[]\" value=\"".$pre['id']."\" />";

		$c.= "<span class=\"lmfe_more ".$info['type']."\" id=\"lmfe_more_".$info['formName']."_".$info['name']."\">\n";
	}


	$c.= lmfe_tnit( $info );
	
	$c.= $info['PreTab']."<label class=\"lmfe_fileDiv\">\n";
	$c.= $info['PreTab']."\t<span class='btn btn-primary'>".$info['placeholder']."</span>\n";
	
	$c.= $info['PreTab']."\t<input type=\"".$info['type']."\" ".
		"name=\"".$info['name']."[]\" ".
		"accept=\"".$info['accept']."\" ".
		( $info['etc'] ? $info['etc']." " : '' ).
		"/>\n";
	$c.= $info['PreTab']."</label>\n";
	
	$c.= listmaker_form_element_this_file__preload( $info, $pre );


	#
	# +
	if( $info['moreButton'] ){
		if( $allowMoreButton ){
			$c.= "<icon></icon>\n";
		}
		
		$c.= "</span>\n"; // lmfe_more

		if(! $info['inDiv'] ){
			$c.= "</span>\n";
		}

	}

	return $c;
}

