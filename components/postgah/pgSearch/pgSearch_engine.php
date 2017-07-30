<?php

# jalal7h@gmail.com
# 2017/07/30
# 1.3

function pgSearch_engine( $q ){

	$limit = 10;

	$p = intval( $_REQUEST['p'] );
	$start = $limit * $p;
	$res = [];

	if( $cat = $_GET['q_cat'] ){
		$cat_q = " AND `item`.`cat_serial` LIKE '%/".$cat."/%' ";
	}

	if( $pos = $_GET['q_pos'] ){
		$pos_q = " AND `item`.`position_serial` LIKE '%/".$pos."/%' ";
	}

	if( $_GET['postgah_sales'] == 1 ){
		$postgah_sales_q = " AND `item`.`sale_by_postgah`=1 ";
	}
	if( $_GET['pictured_ads'] == 1 ){
		$pictured_ads_q = " AND `item`.`id` IN (SELECT DISTINCT `item_image`.`item_id` FROM `item_image` WHERE `item_image`.`hide`=0) ";
	}

	if(! in_array( $_REQUEST['price_range'] , [ '', '0-n' ] ) ){
		list($prMin, $prMax) = explode('-', $_REQUEST['price_range']);
		$prMin = number_fa2en($prMin);
		$prMax = number_fa2en($prMax);
		$priceRange_q = " AND `item`.`cost` >= $prMin ";
		if( $prMax != 'n' ){
			$priceRange_q.= " AND `item`.`cost` <= $prMax ";
		}
	}
	
	$query = " SELECT *, ".
		" MATCH (`text`) AGAINST ( '$q' IN BOOLEAN MODE) AS text_relevance, ".
		" MATCH (`name`) AGAINST ( '$q' IN BOOLEAN MODE) AS title_relevance ".
		" FROM `item` ".
		" WHERE 1 AND `flag`='2' AND `expired`='0' $cat_q $pos_q $pictured_ads_q $postgah_sales_q $priceRange_q ".
		" AND MATCH (`name`,`text`) AGAINST ( '$q' IN BOOLEAN MODE ) ".
		" ORDER BY title_relevance DESC , text_relevance DESC LIMIT $start, $limit ";

	// kword

	// category

	if(! $rs = dbq($query) ){
		e( dbe() );

	} else if(! dbn($rs) ){
		//

	} else while( $rw = dbf($rs) ){
		$res[] = $rw;
		// echo "<hr>";
		// echo 'title_relevance : ' . $rw['title_relevance']."<br>";
		// echo 'text_relevance : ' . $rw['text_relevance']."<br>";
	}

	$query = " SELECT * FROM `item` WHERE `flag`='2' AND `expired`='0' $pos_query AND MATCH (`name`,`text`) AGAINST ('$q' IN BOOLEAN MODE ) ";
	$link = _URL."/?".query_string_set( "p", "%%" );
	// echo query_string_set();die();
	$paging = listmaker_paging( $query, $link, $limit );
	$paging = str_replace( '<a href', '<a rel="nofollow" href', $paging );
	
	que::push( 'pgSearch_engine_paging', $paging );

	return $res;

}



