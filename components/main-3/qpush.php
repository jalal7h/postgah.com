<?

# jalal7h@gmail.com
# 2016/10/05
# 1.1

function qpush( $name, $value ){

	$GLOBALS[ 'qpush-'.$name ] = $value;

	return true;
}


function qpop( $name ){

	if(! $value = $GLOBALS[ 'qpush-'.$name ] ){
		return '';

	} else {
		unset( $GLOBALS[ 'qpush-'.$name ] );
		return $value;
	}

}


