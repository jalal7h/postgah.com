<?

# jalal7h@gmail.com
# 2016/11/14
# 1.1

function lang_sync_db_putInFiles( $c ){
	
	$v = component_version('lang');
	$db = "components/lang-".$v."/db";

	if(! file_exists($db) ){
		ed();
	
	} else if(! $dp = opendir($db) ){
		ed();

	} else while( $file_name = readdir($dp) ){
		
		$file_path = $db."/".$file_name;
		
		if(! is_file($file_path) ){
			continue;
		
		} else if( substr($file_name,2,4) != '.txt' ){
			continue;
		
		} else {
			$langs[ substr($file_name,0,2) ] = $file_path;
		}

	}

	if(! sizeof($langs) ){
		file_put_contents( $db."/fa.txt", $c );

	} else foreach ($langs as $file_name => $file_path) {
		
		if(! lang_sync_db_putInFiles_syncfile( $file_path , $c ) ){
			ed();

		} else {
			echo $file_name." sync done<hr>";
		}

	}

}

function lang_sync_db_putInFiles_syncfile( $file_path, $new_c ){

	$new_c_arr = lang_sync_db_putInFiles_syncfile_convert_text_to_codeArray( $new_c );
	
	$old_c = file_get_contents($file_path);
	$old_c_arr = lang_sync_db_putInFiles_syncfile_convert_text_to_codeArray( $old_c );
	

	# 
	# remove unusing words
	if( lang_sync_remove === true ){
		foreach ($old_c_arr as $key => $value) {
			if(! array_key_exists( $key, $new_c_arr) ){
				unset( $old_c_arr[$key] );
			}
		}
	}


	# 
	# merge new and old, and implode
	if( sizeof($new_c_arr) ){
		foreach ($new_c_arr as $code => $text) {
			$c_arr[ $code ] = $text;
		}
	}
	if( sizeof($old_c_arr) ){
		foreach ($old_c_arr as $code => $text) {
			$c_arr[ $code ] = $text;
		}
	}

	# 
	# save on disk
	foreach ($c_arr as $code => $text) {
		$c.= $code." ".$text."\n";
	}
	file_put_contents( $file_path, trim($c) );
	
	return true;
}


function lang_sync_db_putInFiles_syncfile_convert_text_to_codeArray( $c ){
	
	$f_arr = explode("\n", $c);
	
	foreach ($f_arr as $key => $value) {
		
		if(! $value = trim($value) ){
			continue;
		
		} else if(! $code = trim( substr( $value, 0, lang_hash_length ) ) ){
			continue;

		} else if(! $text = trim( substr( $value, lang_hash_length+1 ) ) ){
			continue;

		} else {
			$c_arr[ $code ] = $text;
		}

	}

	return $c_arr;

}





