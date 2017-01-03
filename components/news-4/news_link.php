<?

# jalal7h@gmail.com
# 2017/01/03
# 1.0

function news_link($rw){
	
	$link = name_for_link( $rw['name'] , 80 );
	$link = _URL.'/'.Slug::get( 'page', 51 ).'/'.$rw['id'].'-'.$link.'.html';
	
	return $link;
	
}
