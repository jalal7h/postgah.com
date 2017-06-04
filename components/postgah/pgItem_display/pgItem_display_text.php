<?

$GLOBALS['block_layers_center']['pgItem_display_text'] = 'نمایش آیتم - شرح آگهی';

function pgItem_display_text( $rw_pagelayer ){
	
	if(! $rw_item = pgItem_fetch() ){
		e();

	} else {
		
		$title = $rw_pagelayer['name'];
		
		$content = "<div class=\"".__FUNCTION__."\">";
		$content.= nl2br($rw_item['text']);
		$content.= "
		<div class=\"text_footer\" item_id=\"".$rw_item['id']."\">
			<a ".abusereport('item',$rw_item['id'])." >گزارش تخلف</a>
			<a class=\"print_button\">نسخه چاپی</a>
		</div>";
		$content.= "</div>";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}









