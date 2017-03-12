<?php

# jalal7h@gmail.com
# 2017/03/10
# 1.0

add_action('userloginverify_sms_verify');

function userloginverify_sms_verify(){
	
	if(! $cell = $_REQUEST['cell'] ){
		e();
		
	} else if(! $code = var_control( $_REQUEST['code'], '0-9' ) ){
		e();
		
	// } else if( userloginverify_sms_keyTimeRemined() == 0 ){
	// 	echo convbox_back( __('مدت‌زمان اعتبار کد فعال‌سازی ثبت‌نام به پایان رسته است.<br>لطفا دوباره سعی کنید.') );
	
	} else if(! $keyCur = userloginverify_sms_keyCurrent() ){
		e();

	} else if( $keyCur != $code ){
		e();
		
	} else {
		
		echo "OK";
		
		$cell_enc = str_enc($cell);
		$hash = userloginverify_hash($cell);
		echo _URL."/register_verify/$cell_enc/$hash";

	}

}

