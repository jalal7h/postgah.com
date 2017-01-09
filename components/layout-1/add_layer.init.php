<?php

# jalal7h@gmail.com
# 2017/01/06
# 1.0

function add_layer( $func, $name, $position="" ){
	
	switch( $position ){
		case 'side': $var = 'block_layers_side'; break;
		case 'center': $var = 'block_layers_center'; break;
		default : $var = 'block_layers';
	}
	
	$GLOBALS[ $var ][ $func ] = $name;

}

