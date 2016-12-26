<?

# jalal7h@gmail.com
# 2016/12/26
# 1.2

/*
query_string_set( "p", null ); to remove p
query_string_set( "user_id", "some_content" );
*/

# param: should be an array of parameters in uri. null => nothing will be changed
# value: can be array of values for each parameters.
# qs: the url, or a part of url, it can be null
# function returns the uri query string

function query_string_set( $param=null, $value=null, $qs=null ){

	if(! $qs ){
		$qs = $_SERVER['QUERY_STRING'];
	}

	if(! $param ){
		return $qs;
	}

	#############################################
	# array loop
	if( is_array($param) ){
		foreach( $param as $id => $this_param ){
			if( is_array($value) ){
				$this_value = $value[$id];
			} else {
				$this_value = $value;
			}
			$qs = query_string_set( $this_param, $this_value, $qs );
		}
		return $qs;
	}
	#
	#############################################


	$qs_arr = explode('&', $qs);
	
	if(! sizeof($qs_arr) ){

	} else foreach( $qs_arr as $i => $qs_this ){
		
		$qs_this_arr = explode( "=", $qs_arr[$i] );

		if( $qs_this_arr[0] == $param ){
			if( $value === null or $value === '' ){
				unset( $qs_arr[$i] );
			} else {
				$qs_this_arr[1] = $value;
				$qs_arr[$i] = implode('=', $qs_this_arr);
			}
			break;
		}
	}


	$qs = implode('&', $qs_arr);
	// echo "qs : ".$qs."<br>\n";
	return $qs;

}



