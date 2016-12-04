<?

# jalal7h@gmail.com
# 2016/12/03
# 1.2

function useraccess_mg_saveEdit(){

	#
	# check variables
	if(! $user_id = $_REQUEST['id'] ){
		e();

	} else {

		#
		# set array
		$set_array = [ 'name', 'management_title', 'cell' ];

		#
		# take care of password
		if( $password = trim($_REQUEST['password']) ){
			$set_array['password'] = md5( $password );
		}

		dbs( 'user', $set_array, ['id'] );

	}

	#
	# access list
	useraccess_mg_save__access_list( $user_id );

}



