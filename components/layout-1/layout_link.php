<?

# jalal7h@gmail.com
# 2016/12/31
# 1.1

function layout_link( $page_id, $skip_slug=false ){

	if( is_array($page_id) ){
		$page_id = $page_id['id'];
	} else if( $page_id == '_PAGE' ){
		ed();
	}

	if( $page_id == 1 ){
		$link = _URL.'/';
	
	} else if( !$skip_slug and $slug = Slug::get( './?page='.$page_id ) ){
		$link = _URL .'/'. $slug;

	} else if( !$skip_slug and $slug = Slug::get( 'page' , $page_id ) ){
		$link = _URL .'/'. $slug;

	} else {
		$link = _URL.'/page-'.$page_id.'.html';
	}

	return $link;

}

