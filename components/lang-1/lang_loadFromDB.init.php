<?

# jalal7h@gmail.com
# 2016/11/12
# 1.0

function lang_loadFromDB(){

	if( $GLOBALS['lang_loadFromDB'] ){
		return true;
	
	} else {
		
		$v = component_version('lang');
		$path = "components/lang-".$v."/db/".lang_code.".txt";
		
		foreach ( file($path) as $i => $line ){
			
			$line_md5 = substr( $line, 0, lang_hash_length );
			$line_text = substr( $line , lang_hash_length+1 );
			
			$GLOBALS['lang_loadFromDB'][ $line_md5 ] = $line_text;

		}

	}

}



