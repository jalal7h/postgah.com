<?

$GLOBALS['block_layers_center']['pgItem_display_comment'] = 'نمایش آیتم - نظرات';

function pgItem_display_comment( $rw_pagelayer ){
	
	if(! $item_id = $_REQUEST['item_id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		$content.= fbcm( "item" , $item_id );
		
		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}


