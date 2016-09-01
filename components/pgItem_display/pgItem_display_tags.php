<?

$GLOBALS['block_layers']['pgItem_display_tags'] = 'نمایش آیتم - برچسب ها';

function pgItem_display_tags( $rw_pagelayer ){

	if(! $item_id = $_REQUEST['item_id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $kword_array = kwordusage_get( 'item', $item_id ) ){
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

