<?php

# jalal7h@gmail.com
# 2017/05/15
# 1.0

function pgShop_meta( $column ){
	
	if(! $path = $_REQUEST['path'] ){
		d404();

	} else if(! $rw_s = table( 'shop', [ 'path'=>$path ] ) ){
		d404();

	} else if(! $rw_s[0]['flag'] ){
		d404();
	
	} else {
		return $rw_s[0][ $column ];
	}


}

