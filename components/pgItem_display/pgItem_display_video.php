<?

$GLOBALS['block_layers_side']['pgItem_display_video'] = 'نمایش آیتم - نمایش ویدئو';

function pgItem_display_video( $rw_pagelayer ){
	
	if(! $rw_item = pgItem_fetch() ){
		e();

	} else if(! $v = $rw_item['video'] ){
		//

	} else {
		echo videoplayer( $v );
	}

}






