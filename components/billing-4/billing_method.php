<?php

# jalal7h@gmail.com
# 2017/06/02
# 1.0

function billing_method( $method ){
	
	if(! $rw_s = table( 'billing_method', [ 'method'=>$method ] ) ){
		return false;
	
	} else {
		return $rw_s[0];
	}

}

