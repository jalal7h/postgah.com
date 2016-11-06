<?

# jalal7h@gmail.com
# 2016/08/31
# 1.1

# it does not hash the key, just fixes the key
/*README*/

function cache_keycheck( $key ){

	if( is_array($key) ){
		$key = json_encode( $key );
	
	// smart
	} else if( substr($key,0,1)=="[" and substr($key,-1)=="]" ){
		$key = substr($key, 1, -1);
		$key_arr = explode(",", $key);
		foreach ($key_arr as $k => $key_this) {
			if( substr($key_this,-1)=="*" ){
				unset($key_arr[$k]);
				$key_this = substr($key_this,0,-1);
				$key_this_length = strlen( $key_this );
				foreach ($_REQUEST as $Rk => $Rv) {
					if( substr( $Rk, 0, $key_this_length )==$key_this ){
						$key_arr[] = $Rk;
					}
				}
			}
		}

		$key = debug_backtrace()[2]['function'];
		if( sizeof($key_arr) ){
			foreach ($key_arr as $i => $key_this) {
				
				if( isset($_REQUEST[ $key_this ]) ){
					$key_value_arr[] = $key_this . ":" . $_REQUEST[ $key_this ];
				
				} else {
					$key_value_arr[] = $key_this;
				}

			}
			if( sizeof($key_value_arr) ){
				$key.= ":".implode(';',$key_value_arr);
			}
		}
		
	}

	return $key;
	
}

