<?

# jalal7h@gmail.com
# 2016/10/31
# 1.0

function tallfooter_mg_saveNew(){

	if(! $rs = dbq(" SELECT `prio` FROM `tallfooter` WHERE 1 ORDER BY `prio` DESC LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		$prio = 1;
	
	} else {
		$prio = dbr($rs,0,0) + 1;
		dbs('tallfooter', ['name','type','content','grid','prio'=>$prio,'flag'=>1] );
	}

}

