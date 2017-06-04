<?

# jalal7h@gmail.com
# 2017/06/04
# 1.1

function lang_sync_db_components(){
	
	$arr = [];

	if(! $dp = opendir("components") ){
		e();
	
	} else while( $d = readdir($dp) ){
		
		$dir_d = 'components/' . $d;
		
		if( is_dir($dir_d) and substr($d, 0, 1) != '.' and substr($d,0,5) != 'lang-' ){
			$arr = array_merge( $arr, lang_sync_db_components_dir($dir_d) );
		}

	}

	return $arr;

}


function lang_sync_db_components_dir( $dir ){

	$arr = [];

	if(! $dp = opendir($dir) ){
		ed();

	} else while( $d = readdir($dp) ){
					
		$dir_d = $dir.'/'.$d;

		if( substr($d,0,1) == '.' ){
			continue;
		
		} else if( is_dir($dir_d) ){
			$arr = array_merge( $arr, lang_sync_db_components_dir($dir_d) );
		
		} else if( strrchr($d, ".") != '.php' ){
			continue;

		} else if(! $php = implode('', file($dir_d) ) ) {
			e( $dir_d );

		} else {
			$php = str_replace( '"', "'", $php );
			$php = str_replace( "__( '", "__('", $php );
			$key_arr = explode( "__('", $php );
			
			if(! sizeof($key_arr) ){
				continue;

			} else for( $i=1; $i<sizeof($key_arr); $i++ ){
				
				if(! $this_key = trim($key_arr[$i]) ){
					continue;
				
				} else if(! $the_key_str = trim( explode( "'", $this_key )[0] ) ){
					continue;

				} else {
					$the_key_str = nl2br($the_key_str);
					$arr[ ":".lang_hash($the_key_str) ] = $the_key_str;
				}

			}
		}

	}

	return $arr;

}

