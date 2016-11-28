<?

# jalal7h@gmail.com
# 2016/11/28
# 1.0

function kwordbanned_clear( &$word ){

	# 
	# load the kb
	if(! kwordbanned_clear_load_the_words() ){
		return $word;
	}
	$kb = $GLOBALS['kwordbanned_clear_load_the_words'];

	#
	# filter
	foreach( $kb as $i => $kb_word ){
		$word = str_replace( $kb_word, "***", $word );
	}

	return $word;

}

function kbclear( &$word ){
	return kwordbanned_clear( $word );
}


function kwordbanned_clear_load_the_words(){

	if( sizeof($GLOBALS['kwordbanned_clear_load_the_words']) ){
		return true;
	
	} else if(! $rs = dbq(" SELECT `kword` FROM `kwordbanned` ") ){
		return false;

	} else if(! dbn($rs) ){
		return false;
	
	} else while( $rw = dbf($rs) ){
		if(! $kword = trim($rw['kword']) ){
			continue;
		
		} else {
			$GLOBALS['kwordbanned_clear_load_the_words'][] = $kword;
		}
	}

	if(! sizeof($GLOBALS['kwordbanned_clear_load_the_words']) ){
		return false;

	} else {
		return true;
	}

}

