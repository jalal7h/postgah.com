<?

# jalal7h@gmail.com
# 2016/12/21
# 1.0

function do_admin_widgets(){
	
	echo '<div class="admin_widgets">';

	if(! sizeof( $GLOBALS['admin_widget'] ) ){
		convbox( __('ابزارکی تعریف نشده است.') );

	} else foreach( $GLOBALS['admin_widget'] as $func => $info ){
		
		ob_start();

		$func();

		$content = ob_get_contents();
		ob_end_clean();

		if(! $func ){
			continue;
		
		} else {

			$template = template_engine( 'do_admin_widgets', [
				'name' => $info['name'],
				'content' => $content,
				'grid' => 'grid'.( $info['grid'] ? $info['grid'] : '12' ),
			]);

			echo trim( $template, " \t\n\r" );

		}

	}

	echo '</div>';

}

