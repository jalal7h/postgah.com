<?php

# jalal7h@gmail.com
# 2017/01/20
# 1.0

function add_js_footer( $inp, $file_name=null ){
	
	if( $file_name == null ){
		$js_file_path = $inp;
		$GLOBALS[ 'add_js_footer_url' ][] = $js_file_path;
	
	} else {
		$component_name = $inp;
		$GLOBALS[ 'add_js_footer_component' ][] = [ $component_name, $file_name ];
	}

}



