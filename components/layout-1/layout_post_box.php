<?

# jalal7h@gmail.com
# 2016/11/28
# 2.1

function layout_post_box( $title, $content, $allow_eval=false, $framed=0, $pos="center", $return=false ){
	
	if(! $framed ){
	
		if( $allow_eval==true ){
			ob_start();
			eval("?>$content<?");
			$content = ob_get_contents();
			ob_end_clean();
		}
		
	} else {
		
		if( $allow_eval==true ){
			ob_start();
			eval("?>$content<?");
			$content = ob_get_contents();
			ob_end_clean();
		}

		$vars['layout-title'] = $title;
		$vars['layout-content'] = $content;
		$vars['layout-pos'] = $pos;

		$content = template_engine( "layout-post", $vars );

	}

	if( $return ){
		return $content;
	} else {
		echo $content;
	}

}






