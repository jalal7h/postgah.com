<?php

# jalal7h@gmail.com
# 2017/03/10
# 1.0

function userloginverify_after_registration(){
	
	if(! $user_id = user_logged() ){
		e();

	} else if(! $hash = $_REQUEST['processed_hash'] ){
		e();

	} else if(! $hash = str_dec( $hash ) ){
		e();

	} else if(! $hash_type = explode(':', $hash)[0] ){
		e();

	} else if( in_array($hash_type, ['email','cell'] ) ){
		if(! dbs( 'user', [ $hash_type.'_verified' => 1 ], [ 'id'=> $user_id ] ) ){
			e();
		}
	}

}



