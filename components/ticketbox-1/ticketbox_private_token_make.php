<?

# jalal7h@gmail.com
# 2016/12/17
# 1.0

function ticketbox_private_token_make(){

	$table_name = $_REQUEST['table_name'];
	$table_name = mb_ereg_replace('[^A-Za-z0-9_]+','',$table_name);
	$table_name = trim($table_name);

	if(! $table_name ){
		return false;
	} else if( $table_name != $_REQUEST['table_name'] ){
		return false;
	}

	$table_id = intval( $_REQUEST['table_id'] );
	if(! $table_id ){
		return false;
	} else if( $table_id != $_REQUEST['table_id'] ){
		return false;
	}

	$user_id = intval( $_REQUEST['user_id'] );
	if(! $user_id ){
		return false;
	} else if( $user_id != $_REQUEST['user_id'] ){
		return false;
	}


	$hash_code = $table_name."/".$table_id."/".$user_id."/".__FUNCTION__;
	$hash_code = md5x( $hash_code, 10 );


	return $hash_code;

}









