<?

$GLOBALS['do_action'][] = 'uio_console';

function uio_console(){

	if( $user_id = user_logged() ){
		uio_console_this( $user_id );
	}

	if( $user_id = admin_logged() ){
		uio_console_this( $user_id );
	}

}

function uio_console_this( $user_id ){
	
	dbs('user', [ 'uio_date'=>U() ], [ 'id'=>$user_id ] );
	
}

