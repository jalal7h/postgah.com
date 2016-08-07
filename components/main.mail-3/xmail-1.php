<?

# jalal7h@gmail.com
# 2016/04/18
# Version 1.2

# it checks if its html sends it as html, and if not sends with simple mail function

# array az destination migire, array("john@doe.com", "jenny@doe.com");
# string migire ke ba , ya \n ya ، az ham joda shode bashan "john@doe.com,jenny@doe.com\nmax@joe.com";

function xmail( $dest , $subject , $text , $from , $html=false, $cron=false ){

	if(! $dest ){
		return false;
	}

	####################################################
	#
	if(! is_array($dest) ){
		$dest = str_replace( array('،',"
","\n","\r\n") , ",", $dest );
		if( strstr($dest, ",") ){
			$dest = explode(",", $dest);
		}
	}
	#
	if( is_array($dest) ){
		foreach ($dest as $k => $email) {
			xmail( $email , $subject , $text , $from , $html);
		}
		return true;
	}
	#
	####################################################

	$mail_headers = "From: ".$from."\r\n";

	if( $cron==false and function_exists('mailq') ){
		return mailq( $dest , $subject , $text , $from , $html );
	} else if( $html ){
		return mail_phpmailer( $dest , $subject , $text , $from );
	} else {
		return mail( $dest , $subject , $text , $mail_headers );
	}
}





