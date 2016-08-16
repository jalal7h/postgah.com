<?

# jalal7h@gmail.com
# 2016.07.29
# 1.0

# if we are in admin page

function is_admin(){
	
	if( $_REQUEST['page']=='admin' ){
		return true;
		
	} else {
		return false;
	}

}








