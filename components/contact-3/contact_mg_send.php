<?

function contact_mg_send(){

	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw = table('contact', $id) ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		#
		# variables
		$dest = $rw['email'];
		$subject = "پاسخ:‌ ".$rw['subject'];
		$text = $_REQUEST['reply_content'];
		$text.= "\n\n- - - - - - - - - - - - - - - - - -\n\n";
		$text.= "> \n> ".str_replace( "\n", "\n> ", $rw['content'] );
		$from = $rw['to'];

		#
		# send mail
		xmail( $dest , $subject , $text , $from , $html=false, $cron=false );

		#
		# congragulate
		echo "<div class='convbox'>پیام ایمیل کاربر ارسال شد.</div>";

		#
		# remove contact record
		listmaker_remove( 'contact' );

	}

}

