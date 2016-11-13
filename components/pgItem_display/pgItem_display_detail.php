<?

$GLOBALS['block_layers_side']['pgItem_display_detail'] = 'نمایش آیتم - آمار آگهی';

function pgItem_display_detail( $rw_pagelayer ){
	
	pgItem_viewCounter();
	
	if(! $rw_item = pgItem_fetch() ){
		e();

	} else {

		$content = "
		<div class=\"".__FUNCTION__."\">
			<div class=\"view\">تعداد بازدید : <span>".( $rw_item['view'] >= 1000 ? number_format($rw_item['view']) : $rw_item['view']." بازدید" )."</span></div>
			<div class=\"date_created\">تاریخ ثبت : <span>".substr(U2Vaght($rw_item['date_created']), 0, 10)."</span></div>
			<div class=\"date_updated\">بروزرسانی : <span>".substr(U2Vaght($rw_item['date_updated']), 0, 10)."</span></div>
	
			<div class=\"bookmarky_button\">افزودن به علاقه‌مندی‌ها</div>
			
			".social_links( pgItem_link($rw_item), $rw_item['name'], $socials="fa,tw,go", $head="")."

		</div>";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}

