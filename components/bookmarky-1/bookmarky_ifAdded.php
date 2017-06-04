<?

# jalal7h@gmail.com
# 2017/06/04
# 1.0

function bookmarky_ifAdded( $table_name, $table_id ){

	if(! $user_id = user_logged() ){
		//

	} else if( dbqc( 'bookmarky', [ 'table_name'=>$table_name, 'table_id'=>$table_id, 'user_id'=>$user_id ] ) ){
		return true;
	}

	return false;

}


