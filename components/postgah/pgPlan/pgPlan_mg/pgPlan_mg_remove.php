<?php

# jalal7h@gmail.com
# 2017/07/01
# 1.0

function pgPlan_mg_remove(){
	
	if(! $plan_id = $_REQUEST['id'] ){
		e();

	} else if( dbqc( 'item', [ 'plan'=>$plan_id ] ) ){
		echo convbox('حذف پلان تا زمانی که تعدادی آگهی از آن وجود داشته باشد ممکن نیست.', 'red');
		
	} else {
		listmaker_remove('plan');
	}

}
