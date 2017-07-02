<?

# jalal7h@gmail.com
# 2016/11/27
# 1.0

function billing_management_offline_methods_saveEdit(){
	
	if(! $id = $_REQUEST['id'] ){
		return e();
	
	} else if(! $rw = table("billing_method", $id) ){
		e();
	
	} else if(! dbs( 'billing_method', ['c1','c2','c3'], ['id'] ) ){
		e();
	
	} else {
		return true;
	}

	return false;

}









