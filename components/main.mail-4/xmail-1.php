<?

# jalal7h@gmail.com
# 2016/09/18
# 2.1

function xmail( $dest , $subject , $text , $from , $html=false ){

	if(! is_component('mailserverselector') ){
		if( is_action() ) echo __FUNCTION__." - ".__LINE__."<br>\n";
		return xmail_send( $dest , $subject , $text , $from , $html );
	
	} else {
		if( is_action() ) echo __FUNCTION__." - ".__LINE__."<br>\n";
		return mss_send( 
			debug_backtrace()[1]['function'],
			$dest , $subject , $text , $from , $html );
	}
	
}








