<?

$GLOBALS['mss_list']['contact_mg_send'] = 'ارسال پاسخ به پیام ارتباط با ما';

function contact_mg_send(){

	if(! $id = $_REQUEST['id'] ){
		e();

	} else if(! $rw = table('contact', $id) ){
		e();

	} else {
		
		#
		# variables
		$dest = $rw['email'];
		$subject = __("پاسخ درخواست شما در %%", [setting('tiny_title')] );
		$text = $_REQUEST['reply_content'];
		$text.= "\n\n- - - - - - - - - - - - - - - - - -\n\n";
		$text.= "> \n> ".str_replace( "\n", "\n> ", $rw['content'] );
		$from = $rw['to'];
		
		#
		# send mail
		xmail( $dest , $subject , $text , $from , $html=false );
		
		#
		# congragulate
		echo convbox( __("پیام شما به %% ارسال شد.", [$dest] ) );
		
		#
		# remove contact record
		listmaker_remove( 'contact' );
		
	}

}

