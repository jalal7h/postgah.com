<?

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
			$c[] = 'منتظر تایید';
			break;
	}

	return implode('<br/>', $c);

}




