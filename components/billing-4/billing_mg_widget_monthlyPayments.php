<?

# jalal7h@gmail.com
# 2016/12/21
# 1.0

add_adminwidget([ 
	'func'	=> 'billing_mg_widget_monthlyPayments',
	'grid'	=> 12,
	'cover'	=> true,
	'prio'	=> 1,
]);

function billing_mg_widget_monthlyPayments(){

	#
	# access control
	if( is_component('useraccess') and (! useraccess(admin_logged(), 'billing_mg') ) ){
		return;
	}

	#
	# vaqt
	$Date = UDate( U() );

	# 
	# number of month
	$numb_of_month = explode("/", $Date);
	$numb_of_month = $numb_of_month[1];

	# 
	# list of days
	for( $i=1; $i<=Date_MaxOfMonthDays()[intval($numb_of_month)]; $i++ ){
		# 
		# list of days
		$list_of_days_str[] = '"'.$i.'"';
		#
		# list of costs
		$list = array (
			"skipwallet" => true ,
			"date" => array ( "day" => substr($Date, 0, 8).($i<10?"0".$i:$i) ) ,
		);
		$list_of_days_str_cost[] = round(billing_stat_payment( $list ) * 100 / _billng_unit_rate ) / 100;
	}

	if( sizeof($list_of_days_str) ){
		$list_of_days_str = implode(",", $list_of_days_str);
	}
	if( sizeof($list_of_days_str_cost) ){
		$list_of_days_str_cost = implode(",", $list_of_days_str_cost);
	}


	echo template_engine( 'billing_mg_widget_monthlyPayments', [
		'list_of_days_str' => $list_of_days_str ,
		'list_of_days_str_cost' => $list_of_days_str_cost ,
	]);

}


