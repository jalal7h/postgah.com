<?

# jalal7h@gmail.com
# 2017/05/21
# 1.1

function do_admin_widgets(){
	
	if( sizeof($GLOBALS['admin_widget']) ){
		
		foreach( $GLOBALS['admin_widget'] as $widget ){
			
			ob_start();
			$widget['func']();
			$widget['content'] = ob_get_contents();
			ob_end_clean();

			if(! $widget['content'] ){
				continue;
			
			} else {
				$widgets[] = $widget;
			}

		}

	}

	if( sizeof($widgets) ){
		echo template_engine( 'do_admin_widgets', [ 'widgets' => $widgets ] );
	
	} else {
		echo convbox( __('ابزارکی تعریف نشده است.') );
	}

}



