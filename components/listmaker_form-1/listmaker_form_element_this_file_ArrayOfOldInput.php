<?


function listmaker_form_element_this_file_ArrayOfOldInput( $info ){

	#
	# variables
	$table = $info['formTable'];
	$rw_table = $GLOBALS['listmaker_form-rw'];
	$id = $rw_table['id'];
	$column = $info['name'];
	$fg_table = $table."_".$column;
	$fg_foregnColumnId = $table."_id";
	
	#
	# fetch all old input
	if(! $rs_fg = dbq(" SELECT * FROM `$fg_table` WHERE `$fg_foregnColumnId`='$id' ORDER BY `id` ASC ") ){
		e(__FUNCTION__,__LINE__);
	
	#
	# if no record found
	} else if(! $rn = dbn($rs_fg) ){
		$c.= listmaker_form_element_this_file_thisInput( $info, $allowMoreButton=true );
	
	# 
	# loop of fetch
	} else while( $rw_fg = dbf($rs_fg) ){
		
		if( ++$i == $rn ){
			$allowMoreButton = true;
		} else {
			$allowMoreButton = false;			
		}

		$c.= lmfe_inDiv_open( $info );
		
		$c.= listmaker_form_element_this_file_thisInput( $info, $allowMoreButton,
			[
				'table'=>$fg_table,
				'id'=>$rw_fg['id'],
				'column'=>$column
			]
		);
		
		$c.= lmfe_inDiv_close( $info );

	}


	return $c;
}
