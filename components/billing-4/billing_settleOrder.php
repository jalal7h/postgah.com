<?

# jalal7h@gmail.com
# 2016/10/23
# 1.2

# after order invoice payment order_table_name_orderSettle( $order_id );
# the order table should have `flag` column
/*README*/

function billing_settleOrder( $order_table , $order_id ){
	
	if(! $order_table ){
		return true;
		
	} else if(! $user_id = user_logged() ){
		e();

	} else if(! $rw_order = table( $order_table, $order_id ) ){
		e();

	} else if( $rw_order['flag'] == 1 ){
		e();

	} else if(! $userCredit = billing_userCredit($user_id) ){
		e();
	
	} else if( $userCredit < $rw_order['cost'] ){
		e();
	
	} else if(! billing_userCredit( $user_id , -1 * $rw_order['cost'] ) ){
		e();
	
	} else if(! dbs( $order_table, ['flag'=>'1'], ['id'=>$order_id] ) ){
		billing_userCredit( $user_id , $rw_order['cost'] );
		e();

	} else {

		$order_settle_func = $order_table."_orderSettle";
		if( function_exists($order_settle_func) ){
			$order_settle_func( $order_id );
		}
		
		# 
		# congragulate
		$vars = $rw_order;
		$vars['cost'] = $rw_order['cost']." ".setting('money_unit');
		echo texty( 'billing_orderSettle', $vars );
		
		return true;

	}

	return false;

}




