<?php

# jalal7h@gmail.com
# 2017/03/08
# 1.0

define( 'userloginverify_sms_deadline' , 300 );

function userloginverify_sms_keyTimeRemined(){
	
	if(! $_SESSION['userloginverify_sms_keyGenerate_time'] ){
		$remaining_time = 0;

	} else {
		
		$passed_time = U() - $_SESSION['userloginverify_sms_keyGenerate_time'];
		$remaining_time = userloginverify_sms_deadline - $passed_time;

		if( $remaining_time < 0 ){
			$remaining_time = 0;
		}
		
	}

	return $remaining_time;

}

