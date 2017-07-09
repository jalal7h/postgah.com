<?

# jalal7h@gmail.com
# 2016/12/02
# 1.1

function get_tables( $refresh = false ){

	if(! $refresh ){
		if( $GLOBALS[__FUNCTION__] ){
			return $GLOBALS[__FUNCTION__];
		}
	}

	if(! $rs = dbq(" SHOW TABLES ") ){
		dg();
	
	} else if(! dbn($rs) ){
		return false;

	} else while( $rw = dbf($rs) ){
		$table_name = $rw[ array_keys($rw)[0] ];
		$GLOBALS[__FUNCTION__][] = $table_name;
	}

	return $GLOBALS[__FUNCTION__];
	
}


