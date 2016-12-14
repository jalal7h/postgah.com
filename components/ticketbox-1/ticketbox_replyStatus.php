<?

# jalal7h@gmail.com
# 2016/12/13
# 1.0

function ticketbox_replyStatus( $rw_ticketbox ){

	$id = $rw_ticketbox['ticketbox_id'];

	if(! $rw_tu = ticketbox_user( $id ) ){
		e();
		
	} else if( $rw_tu['flag'] == 1 ){
		return __('بسته شده');
	
	} else if( ticketbox_isReplied( $id ) ){
		return __("پاسخ‌داده");
	
	} else {
		return __("منتظر پاسخ");
	}

}


