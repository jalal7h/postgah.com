<?

function billing_management_methods_uninstall(){
	
	if(! $method = $_REQUEST['method'] ){
		e();
	
	} else if(! dbq(" DELETE FROM `billing_method` WHERE `method`='$method' ") ){
		e();
	
	} else {
		return true;
	}

	return false;
}

