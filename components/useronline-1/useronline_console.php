<?php

# jalal7h@gmail.com
# 2017/06/09
# 1.0

add_action('useronline_console');

function useronline_console(){

	if( $user_id = user_logged() ){
		useronline_console_this( $user_id );
	}

	if( $user_id = admin_logged() ){
		useronline_console_this( $user_id );
	}

}

function useronline_console_this( $user_id ){
	
	dbs( 'user', [ 'useronline_date'=>U() ], [ 'id'=>$user_id ] );
	
}

