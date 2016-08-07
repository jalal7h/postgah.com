<?

function billing_method_name( $method ){

	if( substr($method,0,6)=='manual' ){
		return table('billing_method', $method, 'c1', 'method');

	} else {
		return $GLOBALS['billing_method'][ $method ];
	}

}

