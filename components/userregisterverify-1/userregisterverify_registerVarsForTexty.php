<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

function userregisterverify_registerVarsForTexty(){

	$username = $_REQUEST['username'];

	if( is_email_correct_or_not($username) ){
		$its = "email";

	} else if( is_cell_correct_or_not($username) ){
		$its = "cell";

	} else {
		e();
		return false;
	}

	switch ( $its ) {
		
		case 'email':
			$email = $username;

			if(! $cell = is_cell_correct_or_not( $_REQUEST['cell'] ) ){
				$cell = '';
			} else if( table('user', $_REQUEST['cell'], null, 'cell') ) {
				$cell = '';
			}
			break;

		case 'cell':
			if(! userlogin_username_mobile ){
				return false;
			} else {
				$cell = $username;
			}
				
			if(! $email = is_email_correct_or_not( $_REQUEST['email'] ) ){
				$email = '';
			} else if( table('user', $_REQUEST['email'], null, 'email') ) {
				$email = '';
			}
			break;
		
		default:
			ed();

	}

	return [ $its, $email, $cell, $username ];

}



