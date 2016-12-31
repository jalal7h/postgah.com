<?

# jalal7h@gmail.com
# 2016/12/31
# 1.2

function is_userpanel(){

	if(! user_logged() ){
		return false;

	} else if( _PAGE != 14 ){
		return false;

	} else {
		return true;
	}

}

