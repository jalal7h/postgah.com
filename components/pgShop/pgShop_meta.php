<?php

# jalal7h@gmail.com
# 2017/05/15
# 1.0

function pgShop_meta( $column ){
	
	if(! $path = $_REQUEST['path'] ){
		// e();

	} else if(! $rw_s = table( 'shop', [ 'path'=>$path ] ) ){
		// e();

	} else {
		return $rw_s[0][ $column ];
	}

}

