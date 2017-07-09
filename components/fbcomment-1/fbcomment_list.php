<?

# jalal7h@gmail.com
# 2017/05/21
# 1.1

function fbcomment_list( $table_name , $table_id , $comment_id=0, $page_id=0 ){
	

	$c = '<div class="fbcomment_list" id="fbcomment_'.$table_name.'_'.$table_id.'_'.$comment_id.'_'.$page_id.'" >';
	

	if( setting('fbcomment_needForConfirm') != 1 ){ // نمایش نظر بدون تایید
		
		if( is_adminUser() ){
			$flag_query = "";
		
		} else if( $user_id = user_logged() ){
			$flag_query = " AND ( `flag`=1 OR `user_id`='$user_id' ) ";
		
		} else {
			$flag_query = " AND `flag`=1 ";
		}

	}


	if(! $rs = dbq(" SELECT * FROM `fbcomment` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."' AND `comment_id`='".$comment_id."' $flag_query ORDER BY `date_created` DESC ") ){
		e();
		
	} else while( $rw = dbf($rs) ){
		$c.= fbcomment_list_this( $table_name , $table_id , $rw );
	}

	$c.= "</div>";

	return $c;
}





