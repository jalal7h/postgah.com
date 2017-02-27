<?php

# jalal7h@gmail.com
# 2017/02/20
# 1.0

function catcustomfield_is_text( $ccf_type ){
	
	if(! in_array( $ccf_type, $GLOBALS['catcustomfield_haveOptions'] ) ){
		return true;
	
	} else {
		return false;
	}

}

