<?php

# jalal7h@gmail.com
# 2017/02/04
# 1.2

function add_ccf_element( $slug, $name, $have_options=false, $displayInFilter=false ){
	
	$GLOBALS['catcustomfield-select-options'][ $slug ] = $name;
	
	if( $have_options ){
		$GLOBALS['catcustomfield_haveOptions'][] = $slug;
	}

	if( $displayInFilter ){
		$GLOBALS['catcustomfield_displayAsFilter'][] = $slug;
	}

}

