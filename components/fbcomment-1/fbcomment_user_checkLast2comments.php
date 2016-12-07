<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

function fbcomment_user_checkLast2comments( $table_name , $table_id ){

	if(! $rs = dbq(" SELECT `user_id` FROM `fbcomment` WHERE `table_name`='$table_name' AND `table_id`='$table_id' ORDER BY `date_created` DESC LIMIT 2 ") ){
		e( dbe() );

	} else if( dbn($rs) != 2 ){
		//
	
	} else {

		$the_first = dbr($rs,0,0);
		$the_second = dbr($rs,1,0);

		if( $the_first == $the_second ){
			return $the_first;
		}

	}

	return 0;

}



