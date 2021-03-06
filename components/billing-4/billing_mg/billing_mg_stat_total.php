<?php

# jalal7h@gmail.com
# 2017/06/23
# 1.0

function billing_management_stat_total(){
	#
	# today
	$date = substr( UDate( U() ) , 0 , 10) ;
	$list = array (
		"skipwallet" => true ,
		"date" => array ("day" => $date)
	);
	$stat_today = billing_format( billing_stat_payment( $list ) );
	if(! $stat_today ){
		$stat_today = '0';
	}

	#
	# yesterday
	$date_yesterday = substr( UDate( U()-(24*3600) ) , 0 , 10) ;
	$list = array (
		"skipwallet" => true ,
		"date" => array ("day" => $date_yesterday)
	);
	$stat_yesterday = billing_format( billing_stat_payment( $list ) );
	if(! $stat_yesterday ){
		$stat_yesterday = '0';
	}

	#
	# week
	$list = array (
		"skipwallet" => true ,
		"date" => array ("week" => $date)
	);
	$stat_week = billing_format( billing_stat_payment( $list ) );
	if(! $stat_week ){
		$stat_week = '0';
	}

	#
	# month
	$list = array (
		"skipwallet" => true ,
		"date" => array ("month" => $date)
	);
	$stat_month = billing_format( billing_stat_payment( $list ) );
	if(! $stat_month ){
		$stat_month = '0';
	}

	#
	# year
	$list = array (
		"skipwallet" => true ,
		"date" => array ("year" => $date)
	);
	$stat_year = billing_format( billing_stat_payment( $list ) );
	if(! $stat_year ){
		$stat_year = '0';
	}

	#
	# total
	$list = array (
		"skipwallet" => true
	);
	$stat_total = billing_format( billing_stat_payment( $list ) );
	if(! $stat_total ){
		$stat_total = '0';
	}
	
	echo "
	<div class='billing_management_stat_total'>
		<div>
			<span>".__('امروز')." :‌ </span>
			<span>$stat_today</span>
		</div>
		<div>
			<span>".__('دیروز')." :‌ </span>
			<span>$stat_yesterday</span>
		</div>
		<div>
			<span>".__('هفته')." :‌ </span>
			<span>$stat_week</span>
		</div>
		<div>
			<span>".__("ماه")." :‌ </span>
			<span>$stat_month</span>
		</div>
		<div>
			<span>".__("سال")." :‌ </span>
			<span>$stat_year</span>
		</div>
		<div>
			<span>".__("کل")." :‌ </span>
			<span>$stat_total</span>
		</div>
	</div>";
}






