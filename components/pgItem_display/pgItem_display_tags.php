<?

$GLOBALS['block_layers']['pgItem_display_tags'] = 'نمایش آیتم - برچسب ها';

function pgItem_display_tags( $rw_pagelayer ){


	if(! $rw_item = pgItem_fetch() ){
		e();

	} else if(! $kword_array = kwordusage_get( 'item', $rw_item['id'] ) ){
		//

	} else {

		$content = "<div class=\"".__FUNCTION__."\">\n";
		foreach ($kword_array as $i => $kword) {
			$content.= "\t<a target=\"_blank\" href=\"".pgItem_tag_link( $kword , $rw_item )."\">".$kword."</a>\n";
		}
		$content.= "</div>\n";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}

