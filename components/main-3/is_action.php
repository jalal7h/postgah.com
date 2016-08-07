<?

# jalal7h@gmail.com
# 2016.07.29
# 1.0

function is_action(){
	
	if( isset($_REQUEST['do_action']) ){
		return $_REQUEST['do_action'];
		
	} else {
		return false;
	}

}








