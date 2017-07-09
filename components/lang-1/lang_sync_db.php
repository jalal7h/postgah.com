<?

# jalal7h@gmail.com
# 2016/11/02
# 1.0

$GLOBALS['do_action'][] = 'lang_sync_db';

function lang_sync_db(){

	#
	# get the __( content
	$arr = [];
	#
	$arr_c = lang_sync_db_components();
	if( sizeof($arr_c) ){
		$arr = array_merge( $arr, $arr_c );
	}
	#
	$arr_g = lang_sync_db_global();
	if( sizeof($arr_g) ){
		$arr = array_merge( $arr, $arr_g );
	}
	#
	$arr_l = lang_sync_db_lmtc();
	if( sizeof($arr_l) ){
		$arr = array_merge( $arr, $arr_l );
	}
	#
	$arr_s = lang_sync_db_tableSetting();
	if( sizeof($arr_s) ){
		$arr = array_merge( $arr, $arr_s );
	}
	#
	$arr_s = lang_sync_db_tableTexty();
	if( sizeof($arr_s) ){
		$arr = array_merge( $arr, $arr_s );
	}
	#
	$arr_tpl = lang_sync_db_template();
	if( sizeof($arr_tpl) ){
		$arr = array_merge( $arr, $arr_tpl );
	}

	# 
	# convert arr to txt
	foreach( $arr as $md5 => $text ){
		$c.= substr($md5,1)." ".nl2br($text)."\n";
	}

	#
	# save on txt
	lang_sync_db_putInFiles( $c );

	# echo what we did
	// echo "<pre>".$c."</pre>";
	
}



