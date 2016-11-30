<?

# jalal7h@gmail.com
# 2016/11/30
# 2.0

function dbrm( $table, $id=null, $recursive=false ){
	
	if(! $id ){
		if(! $id = $_REQUEST['id'] ){
			return false;
		}
	
	}


	if( is_array($id) ) {
		list( $column_name, $column_value ) = $id;
	
	} else {
		$column_name = 'id';
		$column_value = $id;
	}


	# 
	# recursive records
	if( $recursive ){
		$recursive_column = $table."_id";
		foreach( get_tables() as $i => $recursive_table ){
			if( is_column( $recursive_table, $recursive_column ) ){
				dbq(" DELETE FROM `$recursive_table` WHERE `$recursive_column`='$column_value' ");
			}
		}
	}


	# 
	# main record
	if(! dbq(" DELETE FROM `$table` WHERE `$column_name`='$column_value' LIMIT 1 ") ){

	} else {
		return true;
	}


	return false;

}





