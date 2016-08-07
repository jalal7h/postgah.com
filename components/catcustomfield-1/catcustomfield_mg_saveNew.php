<?

# jalal7h@gmail.com
# 2016/06/14
# Version 1.2

function catcustomfield_mg_saveNew(){

	$prio = dbr( dbq(" SELECT COUNT(*) FROM `catcustomfield` WHERE `cat_id`='".$_REQUEST['cat_id']."' ") , 0, 0 );
	$prio++;
	$id = dbs('catcustomfield', ['cat_id','name','type','prio'=>$prio,'flag'=>'1'] );

	if(! sizeof($_REQUEST['option']) ){
		//
		
	} else foreach ($_REQUEST['option'] as $k => $option_value) {
			
		# 
		# insert
		dbs( 'catcustomfield_option', [ 'catcustomfield_id'=>$id, 'option'=>$option_value ] );

	}

}

