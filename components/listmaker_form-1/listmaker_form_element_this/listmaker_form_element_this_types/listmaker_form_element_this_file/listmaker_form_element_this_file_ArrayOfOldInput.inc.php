<?

# jalal7h@gmail.com
# 2016/09/26
# 1.1

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
	# its a new ads, no need to check for old records
	if(! $id ){
		$c.= listmaker_form_element_this_file_thisInput( $info, $allowMoreButton=true );

	#
	# fetch all old input
	} else if(! $rs_fg = dbq(" SELECT * FROM `$fg_table` WHERE `$fg_foregnColumnId`='$id' ORDER BY `id` ASC ") ){
		e();
	
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
