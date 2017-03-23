<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

add_action('userverification_cell_verify');

function userverification_cell_verify(){
	
	if(! $cell = $_REQUEST['cell'] ){
		e();
		
	} else if(! $code = var_control( $_REQUEST['code'], '0-9' ) ){
		e();
		
	// } else if( userverification_cell_keyTimeRemined() == 0 ){
	// 	echo convbox_back( __('مدت‌زمان اعتبار کد فعال‌سازی ثبت‌نام به پایان رسیده است.<br>لطفا دوباره سعی کنید.') );
	
	} else if(! $keyCur = userverification_cell_keyCurrent() ){
		e();

	} else if( $keyCur != $code ){
		echo __('کد ثبت شده درست نیست.');
		
	} else {

		userverification_make( $cell );
		echo "OK";

	}

}

