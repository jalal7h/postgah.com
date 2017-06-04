<?

# jalal7h@gmail.com
# 2017/05/21
# 1.1

add_adminwidget([ 
	'func'	=> 'pgItem_mg_wg_waitingItems',
	'grid'	=> 6,
	'cover'	=> true,
]);

function pgItem_mg_wg_waitingItems(){
	
	$count_of_ads = number_format( dbqc( 'item', [ 'flag'=>0 ] ) );

	if( $count_of_ads ){
		echo template_engine( 'pgItem_mg_wg_waitingItems', [ 'count_of_ads' => $count_of_ads ] );
	}
	
}


