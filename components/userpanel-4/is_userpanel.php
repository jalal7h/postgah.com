<?

# jalal7h@gmail.com
# 2016/12/19
# 1.1

function is_userpanel(){

	if(! user_logged() ){
		return fasle;

	} else if( $_REQUEST['page'] != 14 ){
		return fasle;

	} else {
		return true;
	}

}

