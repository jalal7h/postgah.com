<?

# jalal7h@gmail.com
# 2016/07/30
# 1.0

function kwordusage_pop( $kword, $table_name, $table_id ){

	if(! $kword_id = table('kword', $kword, 'id', 'kword') ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbq(" DELETE FROM `kwordusage` WHERE `table_name`='$table_name' AND `table_id`='$table_id' AND `kword_id`='$kword_id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);
	
	} else {
		dbdec( 'kword', $kword_id, 'usage_count' );
		return true;
	}

	return false;
}


