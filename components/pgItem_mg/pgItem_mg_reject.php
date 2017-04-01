<?

# jalal7h@gmail.com
# 2017/04/01
# 1.1

add_action('pgItem_mg_reject');
add_jstext('pgItem_mg_reject', 'با سلام،\nکاربر گرامی،\n\nآگهی ثبت شده توسط شما به دلیل مقایرت با قوانین سایت تایید نشد.\nلطفا در انتخاب عنوان و محتوای مناسب بیشتر دقت فرمائید.\n\nبا تشکر\nپستگاه');

function pgItem_mg_reject(){
	
	if(! $item_id = $_REQUEST['item_id'] ){
		e();

	} else if(! $rw_item = table('item', $item_id) ){
		e();

	} else if( $rw_item['flag']!=0 ){
		e();

	} else if(! dbs('item', ['flag'=>'1'], ['id'=>$item_id]) ){
		e();

	} else if(! dbs('item_reject', ['item_id'=>$item_id, 'text']) ){
		e();

	} else {
		return true;
	}

}

