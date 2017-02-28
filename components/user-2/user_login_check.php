<?php

# jalal7h@gmail.com
# 2017/02/28
# 1.0

function user_login_check( $username , $password ){
	
	if(! $username = var_control( $username, 'a-z0-9@_\-\.' ) ){
		return false;
	}

	if( is_component('userhashpassword') ){
		$password = userhashpassword($password);
	}

	#
	# age ba mobile ham mishe login kard ..
	if( defined('userlogin_username_mobile') and userlogin_username_mobile === true ){
		$or_mobile_match = " OR `cell`='$username' ";
	}

	if(! $rs = dbq(" SELECT `id` FROM `user` WHERE ( `username`='$username' $or_mobile_match ) AND `password`='$password' AND `permission`='0' LIMIT 1 ")){
		dg();
	
	} else if( dbn($rs) != 1 ){
		dg();

	} else {
		return dbr($rs, 0, 'id');
	}

	return false;
	
}


