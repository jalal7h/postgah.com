<?php

# jalal7h@gmail.com
# 2017/01/03
# 1.0

function add_headtag( $func ){
	
	if( sizeof($GLOBALS['layout_headtag']) and in_array( $func, $GLOBALS['layout_headtag'] ) ){
		//

	} else {
		$GLOBALS['layout_headtag'][] = $func;
	}

}

