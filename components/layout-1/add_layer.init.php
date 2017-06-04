<?php

# jalal7h@gmail.com
# 2017/01/29
# 1.1

function add_layer( $func, $name, $position='', $repeat='0' ){
	
	switch( $position ){
		case 'side': $var = 'block_layers_side'; break;
		case 'center': $var = 'block_layers_center'; break;
		default : $var = 'block_layers';
	}
	
	$GLOBALS[ $var ][ $func ] = $name;
	$GLOBALS['layout_block_repeat'][ $func ] = $repeat;
	
}




