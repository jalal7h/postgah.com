<?php

# jalal7h@gmail.com
# 2017/01/06
# 1.0

function dbqc( $table, $where_array=null ){
	
	if( $where_array ){
		$where_query = " WHERE 1 ";
		foreach( $where_array as $column_name => $column_value ){
			$where_query.= " AND `$column_name`='$column_value' ";
		}
	}

	$q = " SELECT COUNT(*) FROM `$table` $where_query ";

	if(! $rs = dbq( $q ) ){
		e();

	} else {
		return dbr( $rs, 0, 0 );
	}

}



