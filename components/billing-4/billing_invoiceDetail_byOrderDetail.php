<?

# jalal7h@gmail.com
# 2017/05/28
# 1.1

function billing_invoiceDetail_byOrderDetail( $order_table, $order_id ){

	if(! $rs = dbq(" SELECT * FROM `billing_invoice` WHERE `order_table`='$order_table' AND `order_id`='$order_id' LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		return false;

	} else if(! $rw = dbf($rs) ){
		e();

	} else {
		return $rw;
	}

}

