<?php

# jalal7h@gmail.com
# 2017/01/07
# 1.0

function add_component( $func, $name, $icon=null ){
	
	$GLOBALS['cmp'][ $func ] = $name;
	if( $icon ){
		$GLOBALS['cmp-icon'][ $func ] = $icon;
	}

}

