<?

# jalal7h@gmail.com
# 2016/11/09
# 1.0

function billing_invoiceDetail_byOrderDetail( $order_table, $order_id ){

	if(! $rs = dbq(" SELECT * FROM `billing_invoice` WHERE `order_table`='$order_table' AND `order_id`='$order_id' LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		e();

	} else if(! $rw = dbf($rs) ){
		e();

	} else {
		return $rw;
	}

}

