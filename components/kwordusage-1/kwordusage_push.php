<?

# jalal7h@gmail.com
# 2016/08/05
# 1.1

function kwordusage_push( $kword, $table_name, $table_id ){

	$kword = mb_ereg_replace( '[^a-z0-9آ-ی ]+', '', $kword );
	
	if(! $kword = trim($kword) ){
		return false;
	} else if( strlen($kword) > 100 ){
		return false;
	}

	dbq(" INSERT INTO `kword` (`kword`) VALUES ('$kword') ");

	if(! $rw_kword = table('kword', $kword, null, 'kword') ){
		e(__FUNCTION__,__LINE__, "cant find the word ".$kword );

	} else {
		
		if( dbq(" INSERT INTO `kwordusage` (`table_name`, `table_id`, `kword_id`) VALUES ('$table_name', '$table_id','".$rw_kword['id']."') ") ){
			dbinc( 'kword', $rw_kword['id'], 'usage_count' );
		}
		
	}

}


