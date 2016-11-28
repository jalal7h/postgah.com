<?

# jalal7h@gmail.com
# 2016/11/28
# 1.0

function layout_link( $rw ){

	if( $rw['id'] == 1 ){
		$link = _URL.'/';
	
	} else {
		$link = _URL.'/page-'.$rw['id'].'.html';
	}

	return $link;

}

