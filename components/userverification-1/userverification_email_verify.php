<?php

# jalal7h@gmail.com
# 2017/03/19
# 1.0

function userverification_email_verify( $email, $verify_back ){

	if( $_REQUEST['verify_code'] != userverification_email_key($email) ){
		echo convbox_back( __('لطفا کد فعال‌سازی ایمیل را به درستی وارد کنید.') );
		
	} else {
		userverification_make( $email );
		jsgo( $verify_back );
	}

}

