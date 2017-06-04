<?

# jalal7h@gmail.com
# 2016/11/07
# 1.0

$GLOBALS['do_action'][] = 'mss_mg_server_list_test';

function mss_mg_server_list_test(){

	if(! is_master() ){
		ed();
	
	} else if(! $mssp_id = $_REQUEST['mssp_id'] ){
		ed();

	} else if(! $to = $_REQUEST['mail_to'] ){
		ed();

	} else if(! $rw_mssp = table('mailserverselector_provider', $mssp_id) ){
		ed();

	} else {
		
		$subject = "test mail from "._DOMAIN;
		$text = "Hi,\n\nthis is a test mail from "._DOMAIN." checking the email service sending by `".$rw_mssp['name']."`\n\nregards";
		$from = "noreply@"._DOMAIN;
		$html = false;

		if(! mss_send( $rw_mssp, $to , $subject , $text , $from , $html ) ){
			ed();
		
		} else {
			echo "<div class=\"".__FUNCTION__."\" ><div style=\"font-family:FontAwesome; font-size: 180px;\" class=\"fa fa-check-square\"></div><br>".__('ارسال ایمیل آزمایشی انجام شد.')."</div>";
		}

	}

}







