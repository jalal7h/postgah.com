<?php

# jalal7h@gmail.com
# 2017/02/28
# 1.0

function userloginverify_split(){
	
	if(! $username = trim( strip_tags($_REQUEST['username']) ) ){
		$prompt = __('لطفا %% خود را وارد کنید.', userlogin_username_title );

	} else if(! $username = var_control($username, 'a-zA-Z0-9@._-') ){
		$prompt = __('لطفا %% خود را به درستی وارد کنید.', userlogin_username_title );

	} else if( is_email_correct_or_not($username) ){
		userloginverify_email($username);
		return true;

	} else if(  userlogin_username_mobile === true  and  is_cell_correct_or_not($username)  ){
		userloginverify_sms($username);
		return true;
	}
	
	qpush( 'userloginverify_form_username', __('لطفا %% خود را به درستی وارد کنید.', userlogin_username_title ) );
	
	return false;

}

