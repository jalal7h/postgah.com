<?

# jalal7h@gmail.com
# 2016/11/13
# 1.0

function lang_keyExists( $the_key ){

	$hash_key = lang_hash( $the_key );
	return array_key_exists( $hash_key, $GLOBALS['lang_loadFromDB'] );

}



