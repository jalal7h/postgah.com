<?

# jalal7h@gmail.com
# 2016/11/11
# 2.2

# it checks if its html sends it as html, and if not sends with simple mail function

# array az destination migire, array("john@doe.com", "jenny@doe.com");
# string migire ke ba , ya \n ya ، az ham joda shode bashan "john@doe.com,jenny@doe.com\nmax@joe.com";
# ./?do_action=xmail_cron

/*README*/

function xmail_local( $to, $subject, $text, $from=null, $html=false, $mssp_id=0 ){


	if(! $to ){
		return false;
	}


	####################################################
	#
	if(! is_array($to) ){
		$to = str_replace( array('،',"
","\n","\r\n") , ",", $to );
		if( strstr($to, ",") ){
			$to = explode(",", $to);
		}
	}
	#
	if( is_array($to) ){
		foreach ($to as $k => $email) {
			xmail_local( $email , $subject , $text , $from , $html, $mssp_id );
		}
		return true;
	}
	#
	####################################################


	if(! $from ){
		$from_name = setting('tiny_title');
		$from_addr = "noreply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
		$from = '"'.$from_name.'" <'.$from_addr.'>';
	}

	$mail_headers = "From: $from\r\nReply-To: $from\r\nX-Mailer: PHP/".phpversion();

	if( is_component('mailq') and !qpop('xmail-'.md5x($to.$subject.$text))/*prevent-mailq-loop*/ ){
		dg();
		mailq( $to , $subject , $text , $from , $html, $mssp_id );

	} else if( $html ){
		dg();
		return mail_utf8( $to, $subject, $text, $mail_headers );
		
	} else {
		dg();
		return mail( $to , $subject , $text , $mail_headers );
	}

	
}





