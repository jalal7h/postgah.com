<?

# jalal7h@gmail.com
# 2016/07/20
# 1.0

function cronjob_fetch_db_cronjobs(){
	
	$date = U();// + 120;
	
	if(! $rs = dbq(" SELECT * FROM `cronjob` WHERE `date` < '$date' ORDER BY `date` ASC ") ){
		e();

	} else if(! dbn($rs) ){
		return true;

	} else while( $rw = dbf($rs) ){
		$GLOBALS['cronjob'][] = [ $rw['func'], $rw['date'], $rw['vars'], $rw['id'] ];
	}

}






