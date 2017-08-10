<?php

# jalal7h@gmail.com
# 2017/02/27
# 1.0

function user_login_session( $user_id ){

	$_SESSION[ login_key()['uid'] ] = $user_id;

}


