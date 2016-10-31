<?

# jalal7h@gmail.com
# 2016/10/27
# 1.1

function minify_css_remove_spaces( $css ){

	$css = delete_all_between($css, '/*', '*/');

	while( strstr($css, '  ') ){
		$css = str_replace('  ', ' ', $css);
	}
	
	$css = str_replace( ["\r\n", "\t", "\n"], '', $css);
	
	$css = str_replace( 
		[ '; ', ': ', ' ;', ' :', ' {' , ';}', ' > ', ' ,', ', ' ], 
		[ ';' , ':' , ';' , ':' , '{'  , '}' , '>'  , ',' , ',' ], $css);
	
	return $css;

}

