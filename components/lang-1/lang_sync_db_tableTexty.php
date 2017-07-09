<?

# jalal7h@gmail.com
# 2016/12/23
# 1.0

function lang_sync_db_tableTexty(){

	if(! $rs = dbq(" SELECT * FROM `texty` WHERE 1 ") ){
		ed();
		
	} else if(! dbn($rs) ){
		return [];

	} else while( $rw = dbf($rs) ){

		foreach( ['name', 'user_title', 'user2_title'] as $column) {
			if( $text = trim($rw[ $column ]) ){
				$arr[ ':'.lang_hash($text) ] = $text;
			}
		}
		
	}

	return $arr;

}



