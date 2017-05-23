<?php

# jalal7h@gmail.com
# 2017/05/21
# 1.1

function dbqc( $table, $where_array=null ){
	
	#
	# its a query
	if( strstr( $table, ' ' ) ){
		$q = $table;
		$q = explode(' ORDER BY ', $q )[0];
		$q = str_replace( " SELECT * FROM ", " SELECT COUNT(*) FROM ", $q );

	#
	# ...
	} else {
		if( $where_array ){
			foreach( $where_array as $column_name => $column_value ){
				$where_query.= " AND `$column_name`='$column_value' ";
			}
		}

		$q = " SELECT COUNT(*) FROM `$table` WHERE 1 $where_query ";

	}

	if(! $rs = dbq( $q ) ){
		e();

	} else {
		return dbr( $rs, 0, 0 );
	}

}



