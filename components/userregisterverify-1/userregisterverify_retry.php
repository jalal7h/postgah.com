<?php

# jalal7h@gmail.com
# 2017/04/01
# 1.0

function userregisterverify_retry( $username ){
	
	userverification_invalidate( $username );
	jsgo( _URL . '/' . Slug::get('page',58) );

}

