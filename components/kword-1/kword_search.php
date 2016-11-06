<?

# jalal7h@gmail.com
# 2016/09/01
# 1.0

function kword_search( $q, $limit=100 ){
	
	if(! $q = trim($q) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rs = dbq(" SELECT *, MATCH (`kword`) AGAINST ('$q') AS relevance FROM `kword` WHERE MATCH (`kword`) AGAINST ('$q' IN BOOLEAN MODE ) ORDER BY relevance DESC LIMIT $limit ") ){
		e(__FUNCTION__,__LINE__);
		echo dbe();

	} else if(! dbn($rs) ){
		return false;

	} else while( $rw = dbf($rs) ){
		$kword_arr[] = $rw['kword'];
	}

	return $kword_arr;

}


