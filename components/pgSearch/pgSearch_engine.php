<?

# jalal7h@gmail.com
# 2016.08.31
# 1.0

function pgSearch_engine( $q ){

	$limit = 10;

	$p = intval( $_REQUEST['p'] );
	$start = $limit * $p;
	$res = [];

	if( $position_id = $_REQUEST['position_id'] ){
		$pos_query = " AND `position_serial` LIKE '%/".$position_id."/%' ";
	}

	$query = " SELECT *, ".
		" MATCH (`text`) AGAINST ( '$q' IN BOOLEAN MODE) AS text_relevance, ".
		" MATCH (`name`) AGAINST ( '$q' IN BOOLEAN MODE) AS title_relevance ".
		" FROM `item` ".
		" WHERE 1 AND `flag`='2' AND `expired`='0' $pos_query ".
		" AND MATCH (`name`,`text`) AGAINST ( '$q' IN BOOLEAN MODE ) ".
		" ORDER BY title_relevance DESC , text_relevance DESC LIMIT $start, $limit ";

	// kword

	// category

	if(! $rs = dbq($query) ){
		e();
		echo "<hr><div dir=ltr >".dbe()."</div><hr>";

	} else if(! dbn($rs) ){
		//

	} else while( $rw = dbf($rs) ){
		$res[] = $rw;
		// echo "<hr>";
		// echo 'title_relevance : ' . $rw['title_relevance']."<br>";
		// echo 'text_relevance : ' . $rw['text_relevance']."<br>";
	}

	$query = " SELECT * FROM `item` WHERE `flag`='2' AND `expired`='0' $pos_query AND MATCH (`name`,`text`) AGAINST ('*$q*' IN BOOLEAN MODE ) ";
	$link = _URL."/?".query_string_set( "p", "%%" );
	qpush( 'pgSearch_engine_paging', listmaker_paging( $query, $link, $limit ) );

	return $res;

}



