<?

# jalal7h@gmail.com
# 2016/08/28
# 2.0

function xmail( $dest , $subject , $text , $from , $html=false ){

	if(! is_component('mailserverselector') ){
		return xmail_send( $dest , $subject , $text , $from , $html );
	
	} else {
		return mss_send( 
			debug_backtrace()[1]['function'],
			$dest , $subject , $text , $from , $html );
	}
	
}








