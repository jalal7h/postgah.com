<?

# jalal7h@gmail.com
# 2016/12/17
# 1.0

function ticketbox_private_token_make( $elem=null ){

	if(! $elem ){
		$elem = $_REQUEST;
	}

	$table_name = var_control( $elem['table_name'], 'a-zA-Z0-9_' );

	if(! $table_name ){
		return false;
	} else if( $table_name != $elem['table_name'] ){
		return false;
	}

	$table_id = intval( $elem['table_id'] );
	if(! $table_id ){
		return false;
	} else if( $table_id != $elem['table_id'] ){
		return false;
	}

	$user_id = intval( $elem['user_id'] );
	if(! $user_id ){
		return false;
	} else if( $user_id != $elem['user_id'] ){
		return false;
	}


	$hash_code = $table_name."/".$table_id."/".$user_id."/".__FUNCTION__;
	$hash_code = md5x( $hash_code, 10 );


	return $hash_code;

}









