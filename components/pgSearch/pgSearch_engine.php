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
		" MATCH (`name`,`text`) AGAINST ('$q') AS relevance, ".
		" MATCH (`name`) AGAINST ('$q') AS title_relevance ".
		" FROM `item` ".
		" WHERE 1 AND `flag`='2' AND `expired`='0' $pos_query AND MATCH (`name`,`text`) AGAINST ('$q' IN BOOLEAN MODE ) ".
		" ORDER BY title_relevance DESC , relevance DESC LIMIT $start, $limit ";

	// kword

	// category

	if(! $rs = dbq($query) ){
		e(__FUNCTION__,__LINE__);
		echo "<hr><div dir=ltr >".dbe()."</div><hr>";

	} else if(! dbn($rs) ){
		//

	} else while( $rw = dbf($rs) ){
		$res[] = $rw;
	}

	$query = " SELECT * FROM `item` WHERE MATCH (`name`,`text`) AGAINST ('$q' IN BOOLEAN MODE ) ";
	$link = _URL."/?".query_string_set( "p", "%%" );
	qpush( 'pgSearch_engine_paging', listmaker_paging( $query, $link, $limit ) );

	return $res;

}



