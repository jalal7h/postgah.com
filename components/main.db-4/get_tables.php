<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

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
		$list[] = $rw[0];
	}
	
	$GLOBALS[__FUNCTION__] = $list;
	return $list;

}






