<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function abusereport_mg_remove_userItems(){
	
	if(! $user_id = $_REQUEST['user_id'] ){
		e();
		
	} else if(! $rw_user = table('user', $user_id) ){
		e();
		
	} else if(! $id = $_REQUEST['id'] ){
		e();
		
	} else if(! $rw_ar = table('abusereport', $id) ){
		e();
		
	} else if(! $rs = dbq(" SELECT `id` FROM `{$rw_ar['table_name']}` WHERE `user_id`='$user_id' ") ){
		e();

	} else if(! dbn($rs) ){
		//

	} else {
		
		$func_remove = $rw_ar['table_name']."_remove";

		while( $rw = dbf($rs) ){
			
			if( function_exists($func_remove) ){
				if(! $func_remove( $rw['id'] ) ){
					e();
				}
		
			} else if(! dbrm( $rw_ar['table_name'], $rw['id'] ) ){
				e();
			}
			
		}

	}

}









