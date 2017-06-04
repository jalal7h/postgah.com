<?

# jalal7h@gmail.com
# 2016/11/02
# 1.0

function lang_sync_db_lmtc(){

	if(! $rs = dbq(" SHOW TABLES ") ){
		e();

	} else while( $rw = dbf($rs) ){
		
		$table = $rw['Tables_in_'.strtolower(mysql_database)];

		if(! $comment_arr = lmtc($table) ){
			//

		} else {
			$arr[ ":".lang_hash($comment_arr[0]) ] = $comment_arr[0];
			$arr[ ":".lang_hash($comment_arr[1]) ] = $comment_arr[1];
		}
		
		if(! $rs_field = dbq(" DESCRIBE `$table` ") ){
			//

		} else while( $rw_field = dbf($rs_field) ){
			
			// var_dump($rw_field);
			if(! $field = $rw_field['Field'] ){
				e();

			} else if(! $comment = trim( lmtc($table.":".$field) ) ){
				//

			} else {
				
				$comment = nl2br($comment);
				$arr[ ":".lang_hash($comment) ] = $comment;

			}

		}

	}
	
	foreach( $arr as $k => $v ){

		# its not containing any persian character
		if( mb_ereg_replace('[^a-zآ-ی]+','',$v) == mb_ereg_replace('[^a-z]+','',$v) ){
			unset($arr[$k]);
			// $arr[$k] = $v." - removed";
		}
	}

	return $arr;

}



