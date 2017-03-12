<?php

# jalal7h@gmail.com
# 2017/03/08
# 1.0

function userloginverify_sms_keyCurrent(){
	
	// if( userloginverify_sms_keyTimeRemined() > 0 ){
		return $_SESSION['userloginverify_sms_keyGenerate'];
	
	// } else {
		// return false;
	// }

}

