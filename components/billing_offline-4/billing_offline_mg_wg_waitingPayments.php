<?

# jalal7h@gmail.com
# 2017/06/08
# 1.0

add_adminwidget([ 
	'func'	=> 'billing_offline_mg_wg_waitingPayments',
	'grid'	=> 6,
	'cover'	=> true,
	'prio'	=> 3,
]);


function billing_offline_mg_wg_waitingPayments(){
	
	$count = number_format( dbqc( 'billing_invoice', [ " `method` LIKE 'manual%' AND `date`=0 AND `transaction`!='' " ] ) );

	if( $count ){
		echo template_engine( 'billing_offline_mg_wg_waitingPayments', [ 'count' => $count ] );
	}
	
}


