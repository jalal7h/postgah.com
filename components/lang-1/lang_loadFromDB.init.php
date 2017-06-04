<?php

# jalal7h@gmail.com
# 2017/06/04
# 1.1

function lang_loadFromDB(){

	if( $GLOBALS['lang_loadFromDB'] ){
		return true;
	
	} else {
		
		$path = bysideme_local()."/lib/db/".lang_code.".txt";
		
		if(! file_exists($path) ){
			e();

		} else foreach ( file($path) as $i => $line ){
			
			$line_md5 = substr( $line, 0, lang_hash_length );
			$line_text = substr( $line , lang_hash_length+1 );
			
			$GLOBALS['lang_loadFromDB'][ $line_md5 ] = $line_text;

		}

	}

}



