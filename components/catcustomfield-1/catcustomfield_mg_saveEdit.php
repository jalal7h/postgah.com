<?

# jalal7h@gmail.com
# 2016/06/14
# Version 1.2

function catcustomfield_mg_saveEdit(){

	$id = dbs('catcustomfield', ['name','type'], ['id']);

	if(! sizeof($_REQUEST['option']) ){
		//

	} else foreach ($_REQUEST['option'] as $k => $option_value) {
		
		#
		# edit
		if( $option_id = $_REQUEST['option_in_table'][$k] ){
			if( trim($option_value)=='' ){
				dbq(" DELETE FROM `catcustomfield_option` WHERE `id`='$option_id' LIMIT 1 ");
			} else {
				dbs('catcustomfield_option', ['option'=>$option_value], ['id'=>$option_id]);
			}
			
		# 
		# insert
		} else {
			dbs( 'catcustomfield_option', [ 'catcustomfield_id'=>$id, 'option'=>$option_value ] );
		}
	}

}

