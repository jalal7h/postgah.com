<?

# jalal7h@gmail.com
# 2017/01/05
# 1.1

function pgSearch_engine( $q, $cat=0, $pos=0 ){

	$limit = 10;

	$p = intval( $_REQUEST['p'] );
	$start = $limit * $p;
	$res = [];

	if( $cat ){
		$cat_query = " AND `cat_serial` LIKE '%/".$cat."/%' ";
	}
	
	if( $pos ){
		$pos_query = " AND `position_serial` LIKE '%/".$pos."/%' ";
	}

	$query = " SELECT *, ".
		" MATCH (`text`) AGAINST ( '$q' IN BOOLEAN MODE) AS text_relevance, ".
		" MATCH (`name`) AGAINST ( '$q' IN BOOLEAN MODE) AS title_relevance ".
		" FROM `item` ".
		" WHERE 1 AND `flag`='2' AND `expired`='0' $cat_query $pos_query ".
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



