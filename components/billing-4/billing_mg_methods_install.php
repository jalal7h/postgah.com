<?

function billing_management_methods_install(){
	
	if(! $method = $_REQUEST['method'] ){
		e();
	
	} else if(! $rs = dbq(" SELECT * FROM `billing_method` WHERE `method`='$method' ") ){
		e();
	
	} else if( dbn($rs)!=0 ){
		e();
	
	} else if(! dbs('billing_method', ['method','unit'=>'0.1']) ){
		e();
	
	} else {
		return true;
	}

	return false;
}

