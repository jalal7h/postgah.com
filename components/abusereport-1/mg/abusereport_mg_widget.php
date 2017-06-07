<?

# jalal7h@gmail.com
# 2017/06/08
# 1.0

add_adminwidget([ 
	'func'	=> 'abusereport_mg_widget',
	'grid'	=> 6,
	'cover'	=> true,
]);


function abusereport_mg_widget(){
	
	$count = number_format( dbqc( 'abusereport', [ 'flag'=>'0' ] ) );

	if( $count ){
		echo template_engine( 'abusereport_mg_widget', [ 'count' => $count ] );
	}
	
}


