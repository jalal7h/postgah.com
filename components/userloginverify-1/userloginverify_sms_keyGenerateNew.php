<?php

# jalal7h@gmail.com
# 2017/03/08
# 1.0

function userloginverify_sms_keyGenerateNew(){
	
	$_SESSION['userloginverify_sms_keyGenerate_time'] = U();
	
	$rand = rand( 1000 , 9999 );
	$_SESSION['userloginverify_sms_keyGenerate'] = $rand;
	
	return $rand;
	
}

