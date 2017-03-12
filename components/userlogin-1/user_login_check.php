<?php

# jalal7h@gmail.com
# 2017/03/11
# 1.1

function user_login_check( $username , $password ){
	
	#
	# split
	if( is_email_correct_or_not($username) ){
		$its = "email";
	
	} else if(  userlogin_username_mobile === true  and  is_cell_correct_or_not($username)  ){
		$its = "cell";
	
	} else {
		return false;
	}


	$username_query = " `$its`='$username' ";
	
	
	#
	# userloginverify
	if( is_component('userloginverify') ){
		$username_query.= " AND `".$its."_verified`='1' ";
	}

	#
	# query
	if(! $rs = dbq(" SELECT `id` FROM `user` WHERE $username_query AND `password`='$password' AND `permission`='0' LIMIT 1 ")){
		dg();
	
	} else if( dbn($rs) != 1 ){
		dg();

	} else {
		return dbr($rs, 0, 'id');
	}

	return false;
	
}


