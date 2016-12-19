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
	
	} else if(! $rs = dbq(" SELECT COUNT(*) FROM `ticketbox_post` WHERE `ticketbox_id`='$id' ") ){
		e();

	} else if(! $count_of_reply = dbr( $rs, 0, 0 ) ){
		e();

	} else if( $count_of_reply == 1 ){
		return __("جدید");
	
	} else if( ticketbox_isReplied( $id ) ){
		return __("منتظر پاسخ");
	
	} else {
		return __("پاسخ‌داده");
	}

}


