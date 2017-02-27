<?php

# jalal7h@gmail.com
# 2017/02/20
# 1.0

function ccfo_translate( $option_id ){
	
	if( $ccfo = table( 'catcustomfield_option', $option_id ) ){
		return $ccfo['option'];

	} else {
		return '';
	}

}

