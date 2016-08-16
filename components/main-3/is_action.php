<?

# jalal7h@gmail.com
# 2016.07.29
# 1.0

# if we are in a do_action process

function is_action(){
	
	if( isset($_REQUEST['do_action']) ){
		return $_REQUEST['do_action'];
		
	} else {
		return false;
	}

}








