<?

# jalal7h@gmail.com
# 2016/11/28
# 1.0

// <a ".abusereport( 'item',$rw_item['id'] )." >...

function abusereport( $table_name, $table_id ){
	
	$select_option = "<option value='' >-- ".lmtc('abusereport:cat_id')." --</option>".cat_display('abusereport', $array=false );

	$c = "table_name=\"$table_name\" table_id=\"$table_id\" class=\"abusereport\" text_sendButton=\"".__('ارسال')."\" text_textMessage=\"".lmtc('abusereport:text')." ...\" select_option=\"$select_option\" ";

	return $c;

}

