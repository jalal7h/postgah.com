<?php

# jalal7h@gmail.com
# 2017/05/11
# 1.2

add_layer( 'userverification', 'تایید شناسه کاربر', 'center', $repeat='0' );

function userverification(){

	if(! $its = $_REQUEST['its'] ){
		ed();

	} else if(! in_array( $its, ['email','cell'] ) ){
		ed();

	} else if(! $username = $_REQUEST['username'] ){
		ed();

	} else if(! $verify_back = $_REQUEST['verify_back'] ){
		ed();

	} else {

		$cache_key = 'userverification_init_'.$verify_back;
		$verify_back = cache( 'hit', $cache_key, "24hours" );
		$func = 'userverification_'.$its;
		$func( str_dec($username), $verify_back );

	}

}




