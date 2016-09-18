<?

# jalal7h@gmail.com
# 2016/09/18
# 1.0

function mss_get_provider( $call_from_func ){
	
	if(! $rs_mssf = dbq(" SELECT * FROM `mailserverselector_func` WHERE `call_from_func`='$call_from_func' LIMIT 1 ") ){
		dg();

	} else if(! dbn($rs_mssf) ){
		//

	} else if(! $rw_mssf = dbf($rs_mssf) ){
		dg();

	} else if(! $rw_mssp = table('mailserverselector_provider', $rw_mssf['mailserverselector_provider_id']) ){
		dg();		

	} else {
		return $rw_mssp;
	}

	return false;
	
}


