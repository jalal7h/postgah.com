<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

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

		$verify_back = redis( 'userverification_init_'.$verify_back );
		$func = 'userverification_'.$its;
		$func( str_dec($username), $verify_back );

	}

}




