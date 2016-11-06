<?

# jalal7h@gmail.com
# 2016/09/14
# 1.0

function is_column_unique( $table, $column ){
	
	if(! is_column($table, $column) ){
		return false;
	
	} else if(! $rs = dbq(" SHOW INDEXES FROM `$table` WHERE Column_name='$column' AND NOT Non_unique ") ){
		dg('there is no table named as '.$table);
	
	} else if(! dbn($rs) ){
		return false;

	} else {
		return true;
	}
	
}


