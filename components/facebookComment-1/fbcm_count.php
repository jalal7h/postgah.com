<?

function fbcm_count( $table_name , $table_id ) {
	
	if(! $rs = dbq(" SELECT COUNT(*) FROM `facebookComment` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."' ")){
		e( __FUNCTION__ , __LINE__ );
	} else {
		$number_of_comments = dbr( $rs , 0 , 0 );
		if(! $number_of_comments ){
			$number_of_comments = "بدون نظر";
		} else {
			$number_of_comments.= " نظر";
		}
	}

	return $number_of_comments;
}


