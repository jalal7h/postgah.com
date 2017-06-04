<?php

# jalal7h@gmail.com
# 2017/02/06
# 1.0

add_layer( 'pgItem_display_ccf', 'نمایش خصیصه های آگهی', 'center', $repeat='0' );

function pgItem_display_ccf( $rw_pagelayer ){
	
	#
	# get the ccf records
	if(! $records = catcustomfield_view( 'item', intval($_REQUEST['item_id']) ) ){
		//

	} else {

		#
		# put it into view
		$c = template_engine( 'pgItem_display_ccf', [ 'records'=>$records ] );
		
		#
		# wrap it by post_box
		layout_post_box( $rw_pagelayer['name'], $c, $allow_eval=false, $framed=1, $pos="center");

	}

}





