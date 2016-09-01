<?

$GLOBALS['mss_list']['nl_management_send_do'] = 'خبرنامه';

function nl_management_send_do(){

	if(! $subject = trim($_REQUEST['subject']) ){
		e( __FUNCTION__ , __LINE__ );
	} else if(! $text = trim($_REQUEST['text']) ){
		e( __FUNCTION__ , __LINE__ );		
	} else {

		if( $_REQUEST['newsletter_email_list']=='1' ){
			if(! $rws = table(array( 'newsletter' , 'email' )) ){
				;//
			} else if(! sizeof($rws) ){
				;//
			} else foreach ($rws as $k => $rw) {
				if(! $email = trim($rw['email']) ){
					continue;
				} else {
					$list_of_email_addresses[ $email ] = true;
				}
			}
		}

		if( $_REQUEST['users_email_list']=='1' ){
			if(! $rws = table(array( 'users' , 'username' , " AND `username` LIKE '%@%' " )) ){
				;//
			} else if(! sizeof($rws) ){
				;//
			} else foreach ($rws as $k => $rw) {
				if(! $email = trim($rw['username']) ){
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
			xmail( $list , $subject , $text , $from );
			?>
			<div class="convbox">ارسال ایمیل به <?=$i?> آدرس با موفقیت انجام شد</div>
			<?
		}

	}

}

