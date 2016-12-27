<?php

# jalal7h@gmail.com
# 2016/12/27
# 1.3

$GLOBALS['block_layers']['faq_display'] = 'سوالات متداول';

function faq_display( $table_name=null, $page_id=null ){
	
	if(! $rs = dbq(" SELECT * FROM `faq` WHERE 1 ORDER BY `prio` ASC ") ){
		e();
	
	} else if(! dbn($rs) ){
		e();
	
	} else while( $rw = dbf($rs) ){
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









