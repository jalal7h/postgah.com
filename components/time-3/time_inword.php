<?

# jalal7h@gmail.com
# 2016/07/24
# 1.0

# 12 days ago
# 8 minutes later

function time_inword( $U ){

	$now = U();

	if( $U > $now ){
		return time_inword_after( $U );
	} else {
		return time_inword_before( $U );
	}
	
}

