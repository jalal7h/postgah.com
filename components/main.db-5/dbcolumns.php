<?

# jalal7h@gmail.com
# 2016/09/14
# 1.0

function dbcolumns( $table ){
	
	if(! is_table($table) ){
		return false;
	
	} else if(! $rs = dbq(" DESCRIBE `$table` ") ){
		dg();

	} else {

		while( $rw = dbf($rs) ){
			
			if(! in_array( $rw['Key'], ['PRI','UNI'] ) ){
				$rw['Key'] = 'N';
			}

			$list_of_columns[ $rw['Field'] ] = $rw['Key'];

		}

		return $list_of_columns;

	}

}







