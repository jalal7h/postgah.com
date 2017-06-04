<?php

# jalal7h@gmail.com
# 2017/03/19
# 1.0

function userverification_email_send( $email ){
	
	$key = userverification_email_key( $email );
	$link = _URL . '/verify/email/' . $_REQUEST['username'] . '/' . $_REQUEST['verify_back'] . '/' . $key;
	
	texty_email( $email, 'userverification', [ 
		'verify_code' => $key,
		'verify_link' => $link
	]);

}

