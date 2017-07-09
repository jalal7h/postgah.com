<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.2

add_adminwidget([ 
	'func'	=> 'pgItem_mg_wg_waitingItems',
	'grid'	=> 6,
	'cover'	=> true,
]);

function pgItem_mg_wg_waitingItems(){
	
	if(! $rs = dbq(" SELECT COUNT(*) FROM `item` WHERE `flag`=0 AND `id` NOT IN ( SELECT `id` FROM `item` WHERE `flag`='0' AND `hide`='0' AND `id` IN ( SELECT `item_id` FROM `item_plan_duration` WHERE `flag`='0' AND `request_for_date`='0' AND `hide`='0' ) ) ") ){
		e();

	} else {
		$count_of_ads = dbr($rs,0,0);
	}

	$count_of_ads = number_format($count_of_ads);

	if( $count_of_ads ){
		echo template_engine( 'pgItem_mg_wg_waitingItems', [ 'count_of_ads' => $count_of_ads ] );
	}
	
}


