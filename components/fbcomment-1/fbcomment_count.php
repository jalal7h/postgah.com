<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function fbcomment_count( $table_name , $table_id ) {
	
	if(! $rs = dbq(" SELECT COUNT(*) FROM `fbcomment` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."' ")){
		e();
		
	} else {
		
		$number_of_comments = dbr( $rs , 0 , 0 );
		
		if(! $number_of_comments ){
			$number_of_comments = __("بدون نظر");
		
		} else {
			$number_of_comments.= " ".__("نظر");
		}

	}

	return $number_of_comments;

}


