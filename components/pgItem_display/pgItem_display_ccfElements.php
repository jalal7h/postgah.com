<?php

# jalal7h@gmail.com
# 2017/02/05
# 1.0

add_layer( 'pgItem_display_ccfElements', 'نمایش خصیصه های آگهی', 'center', $repeat='0' );

function pgItem_display_ccfElements( $rw_pagelayer ){
	
	$c = catcustomfield_view( 'item', intval($_REQUEST['item_id']) );
	layout_post_box( $rw_pagelayer['name'], $c, $allow_eval=false, $framed=1, $pos="center");

}

