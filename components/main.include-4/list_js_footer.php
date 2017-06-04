<?php

# jalal7h@gmail.com
# 2017/06/04
# 1.2

function list_js_footer(){
	

	#
	# external js files
	if( sizeof($GLOBALS[ 'add_js_footer_url' ]) ){
		foreach ($GLOBALS[ 'add_js_footer_url' ] as $js_file_path) {
			$the_script_codes.= "<script src=\"".$js_file_path."\" type=\"text/javascript\" ></script>\n";
		}
	}

	
	#
	# component public js files
	$the_code.= include_all_js_footer( $return=true );

	#
	# component private js files
	// if( sizeof($GLOBALS[ 'add_js_footer_component' ]) ){
	// 	foreach ($GLOBALS[ 'add_js_footer_component' ] as $arr ) {
			
	// 		list($component_name, $file_name) = $arr;

	// 		if(! $v = component_version($component_name) ){
	// 		} else if(! $file = 'components/'.$component_name.'-'.$v.'/'.$file_name.'.js' ){
	// 		} else if(! file_exists($file) ){
	// 		} else if(! $code = implode( '', file($file) ) ){
	// 		} else {
	// 			$the_code.= "\n/** $component_name / $file_name **/\n";
	// 			$the_code.= $code;
	// 			$the_code.= "\n";
	// 		}

	// 	}
	// }

	#
	# js codes
	if( sizeof($GLOBALS[ 'add_jscode_footer' ]) ){
		foreach ($GLOBALS[ 'add_jscode_footer' ] as $code) {
			$the_code.= "\n";
			$the_code.= $code;
			$the_code.= "\n";
		}
	}

	#
	# minify
	if( minify and !debug ){
		$the_code = JSMin::minify($the_code);
	}

	#
	# export all codes
	$the_script_codes.= "<script src=\""._URL."/" .filedump($the_code,"js"). "\" type=\"text/javascript\" ></script>\n";

	return $the_script_codes;
	
}







