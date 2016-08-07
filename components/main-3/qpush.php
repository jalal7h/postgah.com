<?

# jalal7h@gmail.com
# 2016/06/06
# Version 1.0

function qpush( $name, $value ){

	$GLOBALS[ $name ] = $value;

	return true;
}


function qpop( $name ){

	if(! $value = $GLOBALS[ $name ] ){
		return false;
	} else {
		unset( $GLOBALS[ $name ] );
		return $value;
	}

}


