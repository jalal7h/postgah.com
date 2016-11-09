<?

# jalal7h@gmail.com
# 2016/11/09
# 1.1

function pgItem_user_list_this_status( $rw ){

	// mojudiat
	if( $rw['sold'] ){
		$c[] = "فروخته شده";
	}

	// engheza
	if( $rw['expired'] ){
		$c[] = 'منقضی';
	}

	// taid
	switch ($rw['flag']) {
		
		case 2:
			$c[] = 'تایید شده';
			break;
		
		case 1:
			$c[] = 'رد شده';
			break;

		case 0:
			if( pgItem_haveIncompletePayment($rw) ){
				$c[] = 'منتظر پرداخت';
			} else {
				$c[] = 'منتظر تایید';
			}
			break;
	}

	return implode('<br/>', $c);

}




