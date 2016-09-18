<?

# jalal7h@gmail.com
# 2016/09/18
# 1.0

// this is the main sender of mss
/*README*/

function mss( $to, $subject, $text, $from, $html, $mssp_id, $call_from_func ){
	
	// this is from cronjob
	if( $mssp_id != 0 ){
		$rw_mssp = table('mailserverselector_provider', $mssp_id );
	
	// this is a new one
	} else {
		$rw_mssp = mss_get_provider( $call_from_func );
	}

	return mss_send( $rw_mssp, $to , $subject , $text , $from , $html );

}

