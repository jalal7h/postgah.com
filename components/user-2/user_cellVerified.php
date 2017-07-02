<?php

# jalal7h@gmail.com
# 2017/07/03
# 1.0

function user_cellVerified( $rw_user ){
	
	if( is_numeric($rw_user) ){
		$rw_user = user_detail($rw_user);
	}

	if( $rw_user['cell_verified'] ){
		return true;
	
	} else {
		return false;
	}

}

