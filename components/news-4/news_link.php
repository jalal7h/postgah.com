<?

function news_link($rw){
	
	$link = name_for_link( $rw['name'] , 80 );
	$link = _URL.'/'.Slug::get( 'page', 51 ).'/'.$rw['id'].'-'.$link.'.html';
	
	return $link;
	
}
