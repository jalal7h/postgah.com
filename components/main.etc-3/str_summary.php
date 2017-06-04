<?php

# jalal7h@gmail.com
# 2017/04/14
# 1.0

function str_summary( $str, $limit, $rate=0.4 ){
	
	$half_limit = round( $limit * $rate );

	if( strlen($str) >= $limit ){
		$str = mb_substr( $str, 0, $half_limit ) . ' ... ' . substr( $str, -1*$half_limit );
	}

	return $str;

}

