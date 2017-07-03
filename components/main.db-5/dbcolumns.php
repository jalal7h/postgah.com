<?php

# jalal7h@gmail.com
# 2017/07/03
# 1.3

function dbcolumns( $table ){
	
	$the_key = __FUNCTION__.$table;

	if( $GLOBALS[ $the_key ] ){
		return $GLOBALS[ $the_key ];
	}

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

		$GLOBALS[ $the_key ] = $list_of_columns;
		return $list_of_columns;

	}

}







