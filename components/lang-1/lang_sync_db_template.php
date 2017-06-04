<?

# jalal7h@gmail.com
# 2016/11/14
# 1.0

function lang_sync_db_template(){

	$arr = [];

	if(! sizeof( $GLOBALS['include_all_template'] ) ){
		return $arr;
	
	} else foreach ($GLOBALS['include_all_template'] as $file_name => $file_path) {

		$file_html = file_get_contents( $file_path );
		$file_words = string_between_replace( $file_html, "<lang>", "</lang>" );

		if(! sizeof($file_words) ){
			continue;
		}

		foreach ($file_words as $key => $value) {
			$arr_this[ ':'.lang_hash($value) ] = trim($value);
		}

		if(! sizeof($arr) ){
			$arr = $arr_this;

		} else {
			$arr = array_merge($arr, $arr_this);
		}

	}

	return $arr;

}



