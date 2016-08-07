<?

# jalal7h@gmail.com
# 2016/07/30
# 1.0

function dbinc( $table_name, $table_id, $field_name ){
	
	if(! dbq(" UPDATE `$table_name` SET `$field_name`=`$field_name` + 1 WHERE `id`='$table_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__,dbe());

	} else {
		return true;
	}

	return false;

}





