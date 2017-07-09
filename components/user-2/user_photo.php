<?php

# jalal7h@gmail.com
# 2017/01/10
# 1.1

define( 'user_photo_not_found' , 'image_list/avatar-not-found.png' );

function user_photo( $inp, $real=false ){

	if( is_array( $inp ) ){
		$rw = $inp;
		$user_photo = $rw['profile_pic'];
	} else {
		$user_photo = $inp;
	}
	
	if( is_string($real) ){
		$size = $real;
		$real = false;
	}

	if( $user_photo=='' or !file_exists($user_photo) ){
		if( $real === true ){
			return false;
		}
		$user_photo = user_photo_not_found;
		$not_found = true;
	}

	if(! $size ){
		return $user_photo;
	
	} else if( $not_found ){
		return _URL."/".$user_photo;
	
	} else {
		return _URL."/resize/".$size."/".$user_photo;
	}

}

