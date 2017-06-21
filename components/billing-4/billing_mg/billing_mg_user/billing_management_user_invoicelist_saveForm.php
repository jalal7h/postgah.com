<?php

# jalal7h@gmail.com
# 2017/06/18
# 1.0

function billing_management_user_invoicelist_saveForm(){
	
	if(! $cost = $_REQUEST['cost'] ){
		e();

	} else if(! $user_id = intval($_REQUEST['id']) ){
		e();

	} else if(! billing_invoiceMake( $cost, $order_table="", $order_id=0, $user_id, $visible=1 ) ){
		e();

	} else {
		//
	}

}

