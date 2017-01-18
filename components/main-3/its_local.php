<?

# jalal7h@gmail.com
# 2016/12/02
# 1.0

function its_local(){
	
	return false;

	if( $_SERVER['SERVER_ADDR'] == '127.0.0.1' ){
		return true;

	} else {
		return false;
	}

}




