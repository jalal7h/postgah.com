<?php

# jalal7h@gmail.com
# 2017/04/26
# 1.5

add_layer( 'faq_display', 'سوالات متداول', 'center' );

// function faq_display( $table_name=null, $page_id=null ){
function faq_display( $rw_pagelayer ){
	
	if(! $rw_s = table('faq') ){
		e();

	} else {

		$title = $rw_pagelayer['name'];

		foreach ($rw_s as $rw) {
			$list[] = [ "name"=>$rw['name'], "text"=>$rw['text'] ];
		}
		$content = listmaker_clicktab($list);

		layout_post_box( $title , $content, $allow_eval=false, $framed=true );

	}




}









