<?

$GLOBALS['block_layers_center']['pgItem_display_warning'] = 'نمایش آیتم - اخطار';

function pgItem_display_warning( $rw_pagelayer ){

	$content = $rw_pagelayer['name'];
	$content = "<div class=\"".__FUNCTION__."\">" . $content . "</div>";

	layout_post_box( "", $content, $allow_eval=false, $framed=0, $rw_pagelayer['pos'] );

}

