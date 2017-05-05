<?

# jalal7h@gmail.com
# 2017/05/01
# 1.0

$GLOBALS['mss_list']['nl_mg_send_do'] = 'خبرنامه';

function nl_mg_send_do(){

	if(! $subject = trim($_REQUEST['subject']) ){
		e();
	
	} else if(! $text = trim($_REQUEST['text']) ){
		e();		
	
	} else {

		if( $_REQUEST['newsletter_email_list'] == '1' ){
			
			if(! $rws = table(array( 'newsletter' , 'email' )) ){
				//
			
			} else if(! sizeof($rws) ){
				//
			
			} else foreach( $rws as $k => $rw ){
				if(! $email = trim($rw['email']) ){
					continue;
				} else {
					$list_of_email_addresses[ $email ] = true;
				}
			}

		}

		if( $_REQUEST['user_email_list']=='1' ){
			
			if(! $rws = table(array( 'user' , 'email' , " AND `email` LIKE '%@%' " )) ){
				//
			
			} else if(! sizeof($rws) ){
				//
			
			} else foreach ($rws as $k => $rw) {
				if(! $email = trim($rw['email']) ){
					continue;
				} else {
					$list_of_email_addresses[ $email ] = true;
				}
			}

		}

		if( $numb = $_REQUEST['numb'] ){
			$numb = str_replace( array('،',"
","\n","\r\n") , ",", $numb );
			$numb = explode(",", $numb);
			foreach ($numb as $k => $email) {
				if(! $email = trim($email) ){
					continue;
				} else {
					$list_of_email_addresses[ $email ] = true;
				}
			}
		}

		$from = "noreply@"._DOMAIN;

		if( sizeof($list_of_email_addresses)){
			
			foreach ($list_of_email_addresses as $k => $r) {
				if(! strstr($k, '@')){
					continue;
				} else {
					$list[] = $k;
					$i++;
				}
			}
			
			xmail( $list , $subject , $text , $from, $html=1 );
			echo convbox( __('ارسال ایمیل به %% آدرس با موفقیت انجام شد.', [$i] ) );

		}

	}

}



