<?

# jalal7h@gmail.com
# 2016/04/19
# Version 1.2

function layout_post_box( $title, $content, $allow_eval=false, $framed=true, $position="center" ){
	
	if(!$framed){
	
		if($allow_eval==true){
			eval("?>$content<?");
	
		} else {
			echo $content;
		}
		
	} else {
		
		if($allow_eval==true){
			ob_start();
			eval("?>$content<?");
			$content = ob_get_contents();
			ob_end_clean();
		}
		$vars['layout-title'] = $title;
		$vars['layout-content'] = $content;
		$vars['layout-position'] = $position;
		echo template_engine( "layout-post", $vars );
	}

	return true;
}

