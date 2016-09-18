<?

# jalal7h@gmail.com
# 2016/09/18
# 1.3

# its on top of xmail, just working with xmail
# its storing mail in queue, and sends it via cron
# supports array

function mailq( $to , $subject , $text , $from , $html=true, $mssp_id=0 ){
	
	if( is_array($to) ){
		if( sizeof($to) ){
			foreach ($to as $i => $this_mail) {
				mailq( $this_mail , $subject , $text , $from , $html, $mssp_id );
			}
		}
		return true;
	}


	if( $html ){
		$html = 1;

	} else {
		$html = 0;
	}


	$text = mysql_real_escape_string($text);

	if( is_column('mailq','mssp_id') ){
		$add_to_column_name = ",`mssp_id`";
		$add_to_column_value = ",'$mssp_id'";
	}

	if(! dbq(" INSERT INTO `mailq` (`to`,`subject`,`text`,`mail_from`,`html` $add_to_column_name ) VALUES ('$to','$subject','$text','$from','$html' $add_to_column_value ) ") ){
		e( __FUNCTION__ , __LINE__ , dbe() );
		return false;

	} else {
		return true;
	}

}



