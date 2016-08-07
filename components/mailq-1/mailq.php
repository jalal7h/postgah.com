<?

# jalal7h@gmail.com
# 2016/03/21
# Version 1.1

# its on top of xmail, just working with xmail
# its storing mail in queue, and sends it via cron

function mailq( $to , $subject , $text , $from , $html=true ){
	
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



