<?

# jalal7h@gmail.com
# 2017/01/06
# 1.4

/*
query_string_set( "p", null ); to remove p
query_string_set( "user_id", "some_content" );
*/

# param: should be an array of parameters in uri. null => nothing will be changed
# value: can be array of values for each parameters.
# qs: the url, or a part of url, it can be null
# function returns the uri query string

$GLOBALS['query_string_ignore'] = [ 'PHPSESSID', '_gat', '_ga' ];

function query_string_set( $param=null, $value=null, $qs=null ){

	// $qs = "reza=12&reza=13";

	if(! $qs ){
		if( sizeof($_REQUEST) ){
			// $qs = $_REQUEST;
			$qs = $_GET;
			if( sizeof($GLOBALS['query_string_ignore']) ){
				foreach( $GLOBALS['query_string_ignore'] as $ignore_key ) {
					if( $qs[ $ignore_key ] ){
						unset( $qs[ $ignore_key ] );
					}
				}
			}
			$qs = http_build_query($qs);
		} else {
			$qs = "";
		}
	}

	if(! $param ){
		return trim($qs);
	}

	#############################################
	# recursive loop for array param
	if( is_array($param) ){
		foreach( $param as $id => $this_param ){
			if( is_array($value) ){
				$this_value = $value[$id];
			} else {
				$this_value = $value;
			}
			$qs = query_string_set( $this_param, $this_value, $qs );
		}
		return trim($qs);
	}
	#
	#############################################

	// 1 reza=12&ali=13
	// 2 ./?reza=12&ali=12
	// 3 http://domain.com
	// 4 http://domain.com/?reza=11
	// 5 http://domain.com/somewhere

	#############################################
	# qs fix #1
	if( $qs ){
		if(! strstr( $qs, "=" ) ){
			// 3, 5
			$pre_qs = $qs;
			$qs = "";
		} else if( strstr( $qs, "?" ) ){
			// 2, 4
			$pre_qs = explode('?', $qs)[0];
			$qs = explode('?', $qs)[1];
		} else {
			// 1
		}
	}
	#
	#############################################



	#############################################
	# set req
	parse_str($qs, $req);
	#	
	if( sizeof($req) ){
		foreach( $req as $req_key => $req_value ){
			$req[$req_key] = urldecode($req[$req_key]);
			if( $req_key == $param ){
				if( $value === null or $value === '' ){
					unset( $req[$req_key] );
				} else {
					$req[$req_key] = $value;
				}
				break;
			}
		}
	}
	#
	$qs = http_build_query($req);
	#
	#############################################



	#############################################
	# qs fix #2
	if( $pre_qs ){
		if( $qs ){
			$qs = $pre_qs."?".$qs;
		} else {
			$qs = $pre_qs;
		}
	}
	#
	#############################################



	return trim($qs);

}



