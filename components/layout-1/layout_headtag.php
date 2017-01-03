<?php

# jalal7h@gmail.com
# 2017/01/03
# 1.0

function layout_headtag(){
	
	ksort($GLOBALS['layout_headtag']);

	if(! sizeof($GLOBALS['layout_headtag']) ){
		$c = '';
	
	} else foreach( $GLOBALS['layout_headtag'] as $func ){
		
		if( strstr( $func, '::' ) ){
			$func = explode( '::', $func );
			$the_class = $func[0];
			$the_method = $func[1];
			
			if(! class_exists($the_class) ){
				e( 'the class '.$the_class.' not found' );

			} else {
				$obj = new $the_class;
				if(! method_exists( $obj, $the_method) ){
					e( 'the method '.$the_method.' on class '.$the_class.' not found' );

				} else {
					$c.= call_user_method( $the_method, $obj );
				}
			}

		} else if(! function_exists($func) ) {
			e( 'the function '.$func.' not found' );
		
		} else {
			$c.= $func();
		}

		$c.= "\n\t";

	}

	$c.= setting('html_extra_tags');

	return $c;

}

