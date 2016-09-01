<?

$GLOBALS['block_layers_center']['pgItem_display_text'] = 'نمایش آیتم - شرح آگهی';

function pgItem_display_text( $rw_pagelayer ){
	
	if(! $item_id = $_REQUEST['item_id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		$title = $rw_pagelayer['name'];
		
		$content = "<div class=\"".__FUNCTION__."\">";
		
		$content.= nl2br($rw_item['text']);
		
		$content.= "
		<div class=\"text_footer\">
			<a class=\"abuse_report\">گزارش تخلف</a>
			<a class=\"print_button\">نسخه چاپی</a>
			<a class=\"submit_button ask_from_seller\">سوال از فروشنده</a>
		</div>";

		$content.= "</div>";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}









