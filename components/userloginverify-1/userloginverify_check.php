<?

# jalal7h@gmail.com
# 2017/03/05
# 2.0

function userloginverify_check(){

	if(! $hash = trim(strip_tags($_REQUEST['hash'])) ){
		//

	} else if(! $username = trim(strip_tags($_REQUEST['username'])) ){
		//

	} else if(! $username = str_dec( $username ) ){
		//

	} else if( $hash != userloginverify_hash($username) ){
		// 

	} else if( is_email_correct_or_not($username) ){
		qpush( 'result_of_userloginverify_check', 'email:'.$username );
		return true;
		
	} else if( is_cell_correct_or_not($username) ){
		qpush( 'result_of_userloginverify_check', 'cell:'.$username );
		return true;
		
	} else {
		//
	}
	
	return false;
	
}




