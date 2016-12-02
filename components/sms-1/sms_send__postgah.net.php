<?

# jalal7h@gmail.com
# 2016/11/18
# 1.1

function sms_send( $to , $text ){
	
	if( its_local() ){
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
		//
	
	} else if(! $to = trim($to) ){
		//
		
	} else if(! $html = file_get_contents( str_replace( ['%TO%','%TEXT%'], [$to,urlencode($text)], sms_active_link ) ) ){
		e();

	} else {
		return true;
	}

	return false;

}


