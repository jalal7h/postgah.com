<?php

# jalal7h@gmail.com
# 2017/01/03
# 1.0

$GLOBALS['noindex_pages'] = [ 14, 58, 59, 60, 63 ];

function noindex_pages(){

	if(! sizeof($GLOBALS['noindex_pages']) ){
		return false;
	
	} else {
		return $GLOBALS['noindex_pages'];
	}

}


