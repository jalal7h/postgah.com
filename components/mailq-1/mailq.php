<?

# jalal7h@gmail.com
# 2016/09/09
# 1.2

# its on top of xmail, just working with xmail
# its storing mail in queue, and sends it via cron
# supports array

function mailq( $to , $subject , $text , $from , $html=true ){
	
	if( is_array($to) ){
		if( sizeof($to) ){
			foreach ($to as $i => $this_mail) {
				mailq( $this_mail , $subject , $text , $from , $html );
			}
		}
		return true;
	}

	if($html){
		$html = 1;
	} else {
		$html = 0;
	}

	$text = mysql_real_escape_string($text);
	if(!dbq(" INSERT INTO `mailq` (`to`,`subject`,`text`,`mail_from`,`html`) VALUES ('$to','$subject','$text','$from','$html') ")){
		e( __FUNCTION__ , __LINE__ , dbe() );
		return false;
	} else {
		return true;
	}
}



