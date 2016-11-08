<?

# jalal7h@gmail.com
# 2016/09/18
# 1.0

/*
$rw_mssp['to'] = $to;
$rw_mssp['subject'] = $subject;
$rw_mssp['text'] = $text;
$rw_mssp['html'] = $html;
return xmail_remote( $rw_mssp_and_email_content );
*/

/*README*/

function xmail_remote( $rw ){

	$to = $rw['to'];
	$subject = $rw['subject'];
	$text = $rw['text'];
	$from = $rw['from'];
	$html = $rw['html'];

	#
	# define
	require_once("modules/phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();
	
	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';
	$mail->Host = $rw['server_addr'];
	$mail->Port = $rw['server_port'];
	$mail->SMTPAuth = true;
	$mail->Username = $rw['server_username'];
	$mail->Password = $rw['server_password'];
	

	# from
	if( $rw['sender_addr'] != '' ){
		$mail->From = $rw['sender_addr'];
		$mail->FromName = $rw['sender_name'];
	
	} else if( $from != '' ){
		$mail->From = $from;
		$mail->FromName = '';

	} else {
		$mail->From = "noreply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
		$mail->FromName = "no-reply";
	}


	$mail->AddAddress( $to , "" ); 
	$mail->WordWrap = 50;


	if( $html ){
		$mail->IsHTML(true);
	}


	#
	# content
	$mail->Subject  =  $subject;
	$mail->Body     =  $text;


	#
	# send
	if(! $mail->Send() ){
		dg();
		return false;

	} else {
		return true;
	}


}





