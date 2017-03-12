<?php

# jalal7h@gmail.com
# 2017/03/08
# 1.0

add_action('userloginverify_sms_send');

function userloginverify_sms_send(){

	if(! $cell = $_REQUEST['cell'] ){
		ed();

	} else {
		
		// if the key is generated, sms will be send, and if its already sent it will not
		$key = userloginverify_sms_keyGenerateOrFind();
		if( qpop('userloginverify_sms_keyGenerateOrFind_thisIsNew') == 1 ){
			sms_send( $cell, $key );
		}

		echo userloginverify_sms_keyTimeRemined();
		
	}

}


