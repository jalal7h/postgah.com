<?

# jalal7h@gmail.com
# 2016/11/09
# 3.1

function xmail( $to, $subject, $text, $from='', $html=0, $mssp_id=0 ){

	#
	# fix from
	if( $from=='' ){
		$from_name = setting('tiny_title');
		$from_addr = "noreply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
		$from = '"'.$from_name.'" <'.$from_addr.'>';
	}

	# 
	# force html
	if( defined('xmail_force_html') and ( xmail_force_html == true ) ){
		$text = '<html><body>
		<p style="color:#444;font-size:14px;font-family:tahoma;direction:rtl;">'.nl2br($text).'</p>
		</body></html>';
		$html = 1;
	}

	#
	# maybe local or remote
	if( is_component('mailserverselector') ){
		return mss( $to, $subject, $text, $from, $html, $mssp_id, debug_backtrace()[1]['function'] );

	#
	# only local
	} else {
		return xmail_local( $to, $subject, $text, $from, $html );
	}
	
}








