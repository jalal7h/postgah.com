<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function DateU_en( $Date ){
	
	$Y = intval( substr( $Date,  0, 4) );
	$m = intval( substr( $Date,  5, 2) );
	$d = intval( substr( $Date,  8, 2) );
	$H = intval( substr( $Date, 11, 2) );
	$i = intval( substr( $Date, 14, 2) );
	$s = intval( substr( $Date, 17, 2) );

	// gmmktime
	$U = mktime($H, $i, $s, $m, $d, $Y, -1 );

	return $U;

}



