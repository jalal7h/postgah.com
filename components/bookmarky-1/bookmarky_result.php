<?

#
# تعداد مورد علاقه قرار گرفتن این آیتم
function bookmarky_result( $table_name, $table_id ){

	if(! $rs = dbq(" SELECT COUNT(*) FROM `bookmarky` WHERE `table_name`='$table_name' AND `table_id`='$table_id' ") ){
		e();

	} else if(! $count = dbr($rs,0,0) ){    
		$count = 0;
	}

	return $count;

}


