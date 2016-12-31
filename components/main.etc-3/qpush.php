<?

# jalal7h@gmail.com
# 2016/11/11
# 1.2

function qpush( $name, $value ){

	$the_key = 'qpush-'.$name;
	$GLOBALS[ $the_key ] = $value;

	return true;
}


function qpop( $name ){

	$the_key = 'qpush-'.$name;
	
	if(! array_key_exists($the_key, $GLOBALS) ){
		dg(__FUNCTION__."; the key ".$name." does not exists");
		return false;
	
	} else {
		$value = $GLOBALS[ $the_key ];
		unset( $GLOBALS[ $the_key ] );
		return $value;
	}

}


