<?

function pgCat_number_of_items( $cat_id=0 ){

	if( $cat_id!=0 ){
		$cat_query = " AND `cat_serial` LIKE '%/$cat_id/%' ";
	}

	if(! $rs = dbq(" SELECT COUNT(*) FROM `item` WHERE `flag`='2' AND `expired`='0' $cat_query ") ){
		e( __FUNCTION__,__LINE__,dbe() );

	} else {
		$count = dbr( $rs , 0, 0 );
		$count = number_format( $count );
		return $count;
	}

}

