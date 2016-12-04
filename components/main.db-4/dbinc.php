<?

# jalal7h@gmail.com
# 2016/12/03
# 1.1

function dbinc( $table_name, $table_id, $field_name ){
	
	if(! dbq(" UPDATE `$table_name` SET `$field_name`=`$field_name` + 1 WHERE `id`='$table_id' LIMIT 1 ") ){
		e( dbe() );

	} else {
		return table( $table_name, $table_id, $field_name );
	}

	return false;

}





