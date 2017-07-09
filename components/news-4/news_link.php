<?

# jalal7h@gmail.com
# 2017/05/21
# 1.1

function news_link( $rw ){
	
	if( is_numeric($rw) ){
		$rw = table( 'news', $rw );
	}

	$link = name_for_link( $rw['name'] , 80 );
	$link = _URL.'/'.Slug::getSlugByName('news').'/'.$rw['id'].'-'.$link.'.html';
	
	return $link;
	
}
