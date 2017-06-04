<?php

# jalal7h@gmail.com
# 2017/03/19
# 1.0

function userverification_email_key( $email ){
	
	$key = md5x( $email, 8 );
	$key = hexdec( $key );
	$key = substr( $key, 0, 6 );

	return $key;

}

