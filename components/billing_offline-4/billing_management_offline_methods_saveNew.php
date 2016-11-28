<?

# jalal7h@gmail.com
# 2016/11/27
# 1.0

function billing_management_offline_methods_saveNew(){
	
	if(! $rs0 = dbq(" SELECT `method` FROM `billing_method` WHERE `method` LIKE 'manual%' ORDER BY `id` DESC LIMIT 1 ") ){
		return e();
	
	} else if(! dbn($rs0) ){
		$method = "manual1";
	
	} else {
		$method = dbr($rs0, 0, 0);
		$method = substr($method, 6);
		$method = "manual".($method+1);
	}

	if(! dbs( 'billing_method', ['method'=>$method,'c1','c2','c3','c5'=>'offline'] ) ){
		e();
	
	} else {
		return true;
	}

}









