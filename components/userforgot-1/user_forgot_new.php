<?

# jalal7h@gmail.com
# 2017/03/12
# 1.4

function user_forgot_new(){
	
	if(! $username = $_REQUEST['username'] ){
		ed();
		
	} else if(! $username = str_dec($username) ){
		ed();
	
	} else if(! userverification_inquiry($username) ){
		ed();

	} else {
		echo template_engine( 'user_forgot_new', [ 'username'=>$username ] );
	}

}


