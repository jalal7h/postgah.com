<?php

# jalal7h@gmail.com
# 2017/05/11
# 1.0

# 3600 3600second 10minute 6hour 2day 3week 3month 3season 1year null 1hours-2hours

function cache_hit_timeout_to_second( $timeout ){

	if( strstr( $timeout , '-' ) ){
		$timeout = explode( '-', $timeout );
		$time_a = $timeout[0];
		$time_a = cache_hit_timeout_to_second( $time_a );
		$time_b = $timeout[1];
		$time_b = cache_hit_timeout_to_second( $time_b );
		return rand( $time_a , $time_b );
	}
	
	$timeout = trim( $timeout );
	$timeout_numb = mb_ereg_replace( '[^0-9]+', '', $timeout );
	$timeout_text = mb_ereg_replace( '[^A-Za-z]+', '', $timeout );
	$timeout_text = strtolower($timeout_text);

	switch ( $timeout_text ) {
		
		case 'y':
		case 'year':
		case 'years':
			$timeout_numb*= 31536000;
			break;
		
		case 'M':
		case 'month':
		case 'months':
			$timeout_numb*= 2592000;
			break;

		case 'w':
		case 'week':
		case 'weeks':
			$timeout_numb*= 604800;
			break;
		
		case 'd':
		case 'day':
		case 'days':
			$timeout_numb*= 86400;
			break;

		case 'h':
		case 'hour':
		case 'hours':
			$timeout_numb*= 3600;
			break;

		case 'm':
		case 'min':
		case 'minute':
		case 'minutes':
			$timeout_numb*= 60;
			break;
		
		case 's':
		case 'sec':
		case 'second':
		case 'seconds':
		default:
			//
			break;

	}

	return $timeout_numb;

}



