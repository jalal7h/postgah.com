<?

# jalal7h@gmail.com
# 2016/11/02
# 1.0

function lang_sync_db_components(){
	
	if(! $dp = opendir("components") ){
		e();
	
	} else while( $d = readdir($dp) ){
		
		$component = "components/".$d;

		if( substr($d,0,5) == 'lang-' ){
			continue;

		} else if( substr($d, 0, 1) == '.' ){
			continue;
		
		} else if( is_file($component) ){
			continue;

		} else if(! $dp2 = opendir($component) ){
			e();

		} else while( $d2 = readdir($dp2) ){
						
			$file = $component."/".$d2;

			if( substr($d2,0,1) == '.' ){
				continue;
			
			} else if( is_dir($file) ){
				continue;
			
			} else if( strrchr($file, ".") != '.php' ){
				continue;

			} else if(! $php = implode('', file($file) ) ) {
				e();

			} else {

				$php = str_replace( '"', "'", $php );
				$key_arr = explode( "__('", $php );
				
				if(! sizeof($key_arr) ){
					continue;

				} else for( $i=1; $i<sizeof($key_arr); $i++ ){
					
					if(! $this_key = trim($key_arr[$i]) ){
						continue;
					
					} else if(! $the_key_str = trim(explode( "'", $this_key )[0]) ){
						continue;

					} else {

						$the_key_str = nl2br($the_key_str);
						$arr[ ":".lang_hash($the_key_str) ] = $the_key_str;

					}

				}
			}

		}

	}

	return $arr;

}



