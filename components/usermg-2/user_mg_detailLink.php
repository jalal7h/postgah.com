<?php

# jalal7h@gmail.com
# 2017/06/06
# 1.0

function user_mg_detailLink( $user_id ){
	
	if( is_array($user_id) ){
		$user_id = $user_id['id'];
	}

	return _URL . '/admin/user/view/' . $user_id;

}

