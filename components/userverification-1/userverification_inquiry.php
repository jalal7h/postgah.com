<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

function userverification_inquiry( $username ){
	
	if( $_SESSION[ 'userverification-' . $username ] === true ){
		return true;
	
	} else {
		return false;
	}

}

