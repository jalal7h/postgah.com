<?

# jalal7h@gmail.com
# 2016/12/31
# 1.1

function layout_link( $rw, $skip_slug=false ){

	if(! is_array($rw) ){
		if( is_numeric($rw) ){
			$rw = table( 'page', $rw );
		} else {
			ed();
		}
	}

	if( $rw['id'] == 1 ){
		$link = _URL.'/';
	
	} else if( !$skip_slug and $slug = Slug::get( 'page' , $rw['id'] ) ){
		$link = _URL .'/'. $slug;

	} else {
		$link = _URL.'/page-'.$rw['id'].'.html';
	}

	return $link;

}

