<?

# jalal7h@gmail.com
# 2017/03/05
# 2.0

# barresi mikone k aya username ghablan verify shode ya nashode

function userregisterverify_check(){
	
	// var_dump($_SESSION);
	// session_destroy();

	// shaiad dare az verify bar migarde
	if( str_dec($_REQUEST['username']) ){
		$_REQUEST['username'] = str_dec($_REQUEST['username']);
	}

	if(! $username = $_REQUEST['username'] ){
		// e();
		return false;

	} else if(! userverification_inquiry($_REQUEST['username']) ){
		// e();
		return false;

	} else {
		
		if( is_email_correct_or_not($_REQUEST['username']) ){
			$column = 'email';

		} else if( is_cell_correct_or_not($_REQUEST['username']) ) {
			$column = 'cell';

		} else {
			return false;
		}

		que::push( 'result_of_userregisterverify_check', $column . ':' . $_REQUEST['username'] );
		return true;

	}
	
}




