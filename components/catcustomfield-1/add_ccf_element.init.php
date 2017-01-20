<?php

# jalal7h@gmail.com
# 2017/01/20
# 1.1

function add_ccf_element( $slug, $name, $have_options=false ){
	
	$GLOBALS['catcustomfield-select-options'][ $slug ] = $name;
	
	if( $have_options ){
		$GLOBALS['catcustomfield_haveOptions'][] = $slug;
	}

}

