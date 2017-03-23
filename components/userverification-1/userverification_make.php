<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

function userverification_make( $username ){

	$_SESSION[ 'userverification-' . $username ] = true;

}

