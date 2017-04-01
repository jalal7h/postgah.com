<?php

# jalal7h@gmail.com
# 2017/04/01
# 1.0

function userverification_invalidate( $username ){
	
	unset( $_SESSION[ 'userverification-' . $username ] );

}

