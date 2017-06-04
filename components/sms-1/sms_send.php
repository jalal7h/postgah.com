<?

# jalal7h@gmail.com
# 2017/03/10
# 1.3

function sms_send( $to , $text ){
	
	if( its_local() ){
		dg('sms send; to: '.$to.'; text: '.$text);
		return true;
	}

	if( setting('sms_state') != '1' ){
		//
	
	} else if( is_array($to) ){
		foreach( $to as $i => $to_this ){
			if(! sms_send( $to_this, $text ) ){
				return false;
			}
		}
		return true;

	} else if(! $to = mb_ereg_replace('[^0-9]+','',$to) ){
		dg();
	
	} else if(! $to = trim($to) ){
		dg();
	
	} else if(! $sms_connection_string = setting('sms_connection_string') ){
		dg();

	} else {
		
		$sms_connection_string = str_replace( 

			[ '%TO%',	'%TEXT%' ], 
			[ $to,		urlencode($text) ],

		$sms_connection_string );

		if(! $html = file_get_contents( $sms_connection_string ) ){
			dg();

		} else {
			return true;
		}

	}

	return false;

}


