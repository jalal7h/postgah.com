<?

# jalal7h@gmail.com
# 2017/05/04
# 1.1

function its_local(){
	
	// return false;

	if( in_array( $_SERVER['SERVER_NAME'] , [ '127.0.0.1', 'localhost' ] ) ){
		return true;

	} else {
		return false;
	}

}




