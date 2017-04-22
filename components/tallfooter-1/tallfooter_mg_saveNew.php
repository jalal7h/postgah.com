<?

# jalal7h@gmail.com
# 2017/04/22
# 1.1

function tallfooter_mg_saveNew(){
	
	$_REQUEST['content'] = str_replace( 'href=\"http' , 'hr_korosova_ef=\"http', $_REQUEST['content'] );
	$_REQUEST['content'] = str_replace( 'href=\"' , 'href=\"'._URL.'/' , $_REQUEST['content'] );
	$_REQUEST['content'] = str_replace( 'hr_korosova_ef=\"http' , 'href=\"http', $_REQUEST['content'] );

	if(! $rs = dbq(" SELECT `prio` FROM `tallfooter` WHERE 1 ORDER BY `prio` DESC LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		$prio = 1;
	
	} else {
		$prio = dbr($rs,0,0) + 1;
		dbs('tallfooter', ['name','type','content','grid','prio'=>$prio,'flag'=>1] );
	}

}

