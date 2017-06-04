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
	
	$list = [];

	if(! $rs = dbq(" SHOW TABLES ") ){
		ed();
	
	} else if(! dbn($rs) ){
		//

	} else while( $rw = dbf($rs) ){
		$list[] = $rw[ 'Tables_in_'.strtolower(mysql_database) ];
	}
	
	$GLOBALS[__FUNCTION__] = $list;
	return $list;

}






