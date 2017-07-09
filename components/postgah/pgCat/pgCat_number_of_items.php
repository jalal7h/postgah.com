<?php

# jalal7h@gmail.com
# 2017/06/09
# 1.0

function pgCat_number_of_items( $cat_id=0 ){

	##########################
	$cache_key = __FUNCTION__." - ".$cat_id;
	if( $cache_hit = cache( "hit", $cache_key, "6hours" ) ){
		return $cache_hit;
	} else {
	###########################


	if( $cat_id != 0 ){
		$cat_query = " AND `cat_serial` LIKE '%/$cat_id/%' ";
	}

	if(! $rs = dbq(" SELECT COUNT(*) FROM `item` WHERE `flag`='2' AND `expired`='0' $cat_query ") ){
		e( dbe() );

	} else {
		$count = dbr( $rs , 0, 0 );
		$count = number_format( $count );
	}


	###########################
		return cache( "make", $cache_key, $count );
	}
	##########################

}

