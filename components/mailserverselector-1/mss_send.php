<?

# jalal7h@gmail.com
# 2016/09/18
# 1.1

function mss_send( $rw_mssp, $to , $subject , $text , $from , $html ){

	$mssp_id = intval($rw_mssp['id']);

	switch( $rw_mssp['type'] ){

		case 'smtp':
			$rw_mssp['to'] = $to;
			$rw_mssp['subject'] = $subject;
			$rw_mssp['text'] = $text;
			$rw_mssp['from'] = $from;
			$rw_mssp['html'] = $html;
			return xmail_remote( $rw_mssp );

		case 'phpmail':
			$from = '"'.$rw_mssp['sender_name'].'" <'.$rw_mssp['sender_addr'].'>';
			return xmail_local( $to , $subject , $text , $from , $html, $mssp_id );

		default:
			return xmail_local( $to , $subject , $text , $from , $html, $mssp_id );

	}


}
