<?

# jalal7h@gmail.com
# 2016/11/01
# 1.0

function __( $text, $vars=null ){

	// lang replacement
	if( lang_flag === true ){
		lang_loadFromDB();
		if( $GLOBALS['lang_loadFromDB'][ lang_hash($text) ] ){
			$text = $GLOBALS['lang_loadFromDB'][ lang_hash($text) ];
		}
	}

	// vars replacement
	if( $vars ){
		foreach( $vars as $i => $var ){
			$text = str_replace_first( '%%', $var, $text);
		}
	}
	
	return $text;
	
}

function str_replace_first($from, $to, $subject){
    $from = '/'.preg_quote($from, '/').'/';
    return preg_replace($from, $to, $subject, 1);
}




