<?

# jalal7h@gmail.com
# 2016/11/02
# 1.0

function lang_sync_db_tableSetting(){

	if(! $rs = dbq(" SELECT `name` FROM `setting` WHERE `name`!='' ") ){
		ed();

	} else if(! dbn($rs) ){
		return [];

	} else while( $rw = dbf($rs) ){
		$text = trim($rw['name']);
		$arr[ ':'.lang_hash($text) ] = $text;
	}

	return $arr;

}



