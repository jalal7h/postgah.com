<?php

# jalal7h@gmail.com
# 2017/05/15
# 1.1

function pgShop_checkShopDomain( $domain ){
	
	$subd = substr($domain, strlen(_DOMAIN) );

	if( substr($domain, 0, strlen(_DOMAIN)+1 ) != _DOMAIN.'/' ){
	} else if( strlen($subd) < 3 ){
	} else if(! var_control( $subd, '0-9a-z' ) ){
	} else {
		return true;
	}

	return false;

}




