<?

# jalal7h@gmail.com
# 2016/12/04
# 1.1

/*
query_string_set( "p", null ); to remove p
query_string_set( "user_id", "some_content" );
*/

function query_string_set( $param=null, $value=null ){
	
	$qs = $_SERVER['QUERY_STRING'];
	
	if(! $param ){
		return $qs;
	}

	$qs_arr = explode('&', $qs);
	
	if(! sizeof($qs_arr) ){

	} else foreach( $qs_arr as $i => $qs_this ){
		
		$qs_this_arr = explode( "=", $qs_arr[$i] );

		if( $qs_this_arr[0] == $param ){
			if( $value == null ){
				unset( $qs_arr[$i] );
			} else {
				$qs_this_arr[1] = $value;
				$qs_arr[$i] = implode('=', $qs_this_arr);
			}
			break;
		}
	}

	$qs = implode('&', $qs_arr);
	return $qs;

}

