<?

# jalal7h@gmail.com
# 2016/11/14
# 1.0

function __( $text, $vars=null ){

	// lang replacement
	if( lang_flag ){
		if( do_action != 'lang_sync_db' ){
			lang_loadFromDB();
			if( $GLOBALS['lang_loadFromDB'][ lang_hash($text) ] ){
				$text = $GLOBALS['lang_loadFromDB'][ lang_hash($text) ];
			}
		}
	}
	
	// vars replacement
	if( $vars ){
		foreach( $vars as $i => $var ){
			$text = str_replace_first( '%%', $var, $text);
		}
	}
	
	$text = trim($text);

	if( !strstr($text, " ") and lang_dir == 'ltr' ){
		$text = ucfirst($text);
	}

	return $text;
	
}

function str_replace_first($from, $to, $subject){
	
    $from = '/'.preg_quote($from, '/').'/';
    return preg_replace($from, $to, $subject, 1);

}




