<?php

# jalal7h@gmail.com
# 2017/06/09
# 1.2

function dbcolumns( $table ){
	
	if( $GLOBALS[ __FUNCTION__ ] ){
		return $GLOBALS[ __FUNCTION__ ];
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

		$GLOBALS[ __FUNCTION__ ] = $list_of_columns;
		return $list_of_columns;

	}

}







