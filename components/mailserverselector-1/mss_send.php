<?php

# jalal7h@gmail.com
# 2016/08/28
# 1.0

/* mss_send( $call_from_func, $dest , $subject , $text , $from );*/
/*README*/

function mss_send( $call_from_func, $dest , $subject , $text , $from=null , $html=false ){

	if(! $rs_mssf = dbq(" SELECT * FROM `mailserverselector_func` WHERE `call_from_func`='$call_from_func' LIMIT 1 ") ){

	} else if(! dbn($rs_mssf) ){
		$type = "phpmail";
	
	} else if(! $rw_mssf = dbf($rs_mssf) ){
		$type = "phpmail";

	} else if(! $rw_mssp = table('mailserverselector_provider', $rw_mssf['mailserverselector_provider_id']) ){
		$type = "phpmail";

	} else {
		$type = $rw_mssp['type'];
	}

	echo $type;

	switch( $type ){

		case 'smtp':
			$rw_mssp['dest'] = $dest;
			$rw_mssp['subject'] = $subject;
			$rw_mssp['text'] = $text;
			$rw_mssp['html'] = $html;
			return xmail_smtp( $rw_mssp );

		case 'phpmail':
			$from = '"'.$rw_mssp['sender_name'].'" <'.$rw_mssp['sender_addr'].'>';
			return xmail_send( $dest , $subject , $text , $from , $html );

		default:
			return xmail_send( $dest , $subject , $text , $from , $html );

	}


}

