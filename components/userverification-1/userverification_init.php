<?php

# jalal7h@gmail.com
# 2017/03/14
# 1.0

function userverification_init( $username, $verify_back, $its=null ){
	
	if( $its ){
		if( in_array($its, ['email', 'cell'] ) ){
			ed();
		} else if(! call_user_func('is_'.$its.'_correct_or_not', $username) ){
			return false;
		}
	
	} else if( is_email_correct_or_not($username) ){
		$its = 'email';
		
	} else if( is_cell_correct_or_not($username) ){
		$its = 'cell';		
	}

	$redis_key = md5x( $verify_back, 12 ); // fixed in time
	redis( 'userverification_init_'.$redis_key, $verify_back );
	
	jsgo(  _URL.'/verify/'.$its.'/'.str_enc($username).'/'.$redis_key  );

}

