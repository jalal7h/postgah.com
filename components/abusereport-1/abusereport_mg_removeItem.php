<?

function abusereport_mg_removeItem(){

	if(! $id = $_REQUEST['id'] ){
		e();

	} else if(! $rw_ar = table('abusereport', $id) ){
		e();

	} else if( function_exists( $func_remove = $rw_ar['table_name']."_remove" ) ){
		if(! $func_remove( $rw_ar['table_id'] ) ){
			e();
		}
	
	} else if(! dbrm( $rw_ar['table_name'], $rw_ar['table_id'] ) ){
		e();
	}

	# nxx texty abusereport_mg_removeItem

}

