<?

$GLOBALS['block_layers_side']['pgItem_display_userinfo'] = 'نمایش آیتم - مشخصات آگهی‌دهنده';

function pgItem_display_userinfo( $rw_pagelayer ){
	
	if(! $rw_item = pgItem_fetch() ){
		e();

	} else {
		

		$content = "<div class=\"".__FUNCTION__."\">\n";
		
		if( $rw_item['position_id'] or $rw_item['address'] ){
			$position_name = position_translate( $rw_item['position_id'] );
			$content.= "<div class=\"pos\"><icon></icon><span>".$position_name.( ($position_name and $rw_item['address']) ? "، " : "").$rw_item['address']."</span></div>\n";
		}

		if( $rw_item['cell'] ){
			$content.= "<div class=\"cell\"><icon></icon><a href=\"tel:+98".substr($rw_item['cell'],1)."\">" . $rw_item['cell'] . "</a></div>";
		}
		if( $rw_item['tell'] ){
			$content.= "<div class=\"tell\"><icon></icon><a href=\"tel:+98".substr($rw_item['tell'],1)."\">" . $rw_item['tell'] . "</a></div>";
		}

		$content.= "</div>\n";
		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}


