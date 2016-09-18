<?

# jalal7h@gmail.com
# 2016/09/18
# 3.0

function xmail( $to, $subject, $text, $from='', $html=0, $mssp_id=0 ){

	#
	# fix from
	if( $from=='' ){
		$from_name = setting('tiny_title');
		$from_addr = "noreply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
		$from = '"'.$from_name.'" <'.$from_addr.'>';
	}

	# maybe local or remote
	if( is_component('mailserverselector') ){
		return mss( $to, $subject, $text, $from, $html, $mssp_id, debug_backtrace()[1]['function'] );

	# only local
	} else {
		return xmail_local( $to, $subject, $text, $from, $html );
	}
	
}








