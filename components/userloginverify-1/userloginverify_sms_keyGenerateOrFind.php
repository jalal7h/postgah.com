<?php

# jalal7h@gmail.com
# 2017/03/08
# 1.0

function userloginverify_sms_keyGenerateOrFind(){
	
	if( userloginverify_sms_keyTimeRemined() > 0 ){
		return userloginverify_sms_keyCurrent();
	
	} else {
		qpush( 'userloginverify_sms_keyGenerateOrFind_thisIsNew', 1 );
		return userloginverify_sms_keyGenerateNew();
	}
	
}

