<?

function pgItem_user_list_RejectMessage( $rw ){

	$id = $rw['id'];

	if(! $rs_reject = dbq(" SELECT * FROM `item_reject` WHERE `item_id`='$id' ORDER BY `date_created` DESC LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs_reject) ){
		$rw_reject['text'] = "نامشخص";

	} else if(! $rw_reject = dbf($rs_reject) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_reject['text'] ){
		$rw_reject['text'] = "نامشخص";
	}

	$rw_reject['text'] = nl2br( $rw_reject['text'] );

	return "<div class=\"".__FUNCTION__."\"><div class=\"head\">پیام مدیریت سایت :‌</div><hr>".$rw_reject['text']."<hr><a class=\"submit_button\" href=\"./?page=14&do=pgItem_user_list&do1=form&id=".$id."\">ویرایش</a></div>";

}







