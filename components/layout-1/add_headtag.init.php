<?php

# jalal7h@gmail.com
# 2017/01/03
# 1.0

function add_headtag( $func, $prio=null ){
	
	if( sizeof($GLOBALS['layout_headtag']) and in_array( $func, $GLOBALS['layout_headtag'] ) ){
		return false;

	} else if( $prio === null ) {
		$GLOBALS['layout_headtag'][] = $func;
	
	} else {
		if( $GLOBALS['layout_headtag'][ $prio ] ){
			$GLOBALS['layout_headtag'][] = $GLOBALS['layout_headtag'][ $prio ];
			unset( $GLOBALS['layout_headtag'][ $prio ] );
		}
		$GLOBALS['layout_headtag'][ $prio ] = $func;
	}
}

