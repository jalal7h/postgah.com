<?php

# jalal7h@gmail.com
# 2017/04/01
# 1.1

function userregisterverify_after_registration( $its, $user_id ){

	if(! dbs( 'user', [ $its.'_verified' => 1 ], [ 'id'=> $user_id ] ) ){
		e();
	}

}



