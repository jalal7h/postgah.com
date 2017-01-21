<?php

# jalal7h@gmail.com
# 2017/01/21
# 1.4

add_layer( 'faq_display', 'سوالات متداول', 'center' );

function faq_display( $table_name=null, $page_id=null ){
	
	if(! $rw_s = table('faq') ){
		e();

	} else foreach ($rw_s as $rw) {
		$list[] = [ "name"=>$rw['name'], "text"=>$rw['text'] ];
	}

	$content = listmaker_clicktab($list);

	if( $page_id ){
		$title = table( $table_name , $page_id , "name" );
		layout_post_box( $title , $content, $allow_eval=false, $framed=true, $position="center");
	
	} else {
		$title = $GLOBALS['block_layers']['faq_display'];
		echo "
		<div class=\"".__FUNCTION__."\">
			<div class=\"head\">".$title."</div>
			<hr>
			".$content."
		</div>";
	}

}









