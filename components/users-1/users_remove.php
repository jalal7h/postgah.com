<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function users_remove( $user_id ){
	
	# 
	# remove foreign records
	foreach( get_tables() as $i => $table_name ){
		if( is_column( $table_name, 'user_id' ) ){
			dbq(" DELETE FROM `$table_name` WHERE `user_id`='$user_id' ");
		}
	}

	#
	# remove users record
	dbrm( 'users', $user_id );

	return true;
	
}



