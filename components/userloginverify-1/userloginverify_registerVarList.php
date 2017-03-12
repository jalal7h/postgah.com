<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

function userloginverify_registerVarList(){
	
	if(! $hash = $_REQUEST['processed_hash'] ){
		e();
		return false;
	
	} else if(! $hash = str_dec($hash) ){
		e();
		return false;

	} else if(! $hash_arr = explode(":", $hash ) ){
		e();
		return false;

	} else switch ( $hash_arr[0] ) {
		
		case 'email':
			if(! $email = is_email_correct_or_not( $_REQUEST['email'] ) ){
				e();
				return false;

			} else if( md5x($email,8) != $hash_arr[1] ) {
				e();
				return false;

			} else {
				if(! $cell = is_cell_correct_or_not( $_REQUEST['cell'] ) ){
					$cell = '';
				} else if( table('user', $_REQUEST['cell'], null, 'cell') ) {
					$cell = '';
				}
				$username = $email;
			}
			break;

		case 'cell':
			if(! userlogin_username_mobile ){
				return false;

			} else if(! $cell = is_cell_correct_or_not( $_REQUEST['cell'] ) ){
				e();
				return false;

			} else if( md5x($cell,8) != $hash_arr[1] ) {
				ed();

			} else {
				if(! $email = is_email_correct_or_not( $_REQUEST['email'] ) ){
					$email = '';
				} else if( table('user', $_REQUEST['email'], null, 'email') ) {
					$email = '';
				}
				$username = $cell;
			}
			break;
		
		default:
			ed();

	}


	return [ $email, $cell, $username ];

}



