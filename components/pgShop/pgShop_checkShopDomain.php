<?php

# jalal7h@gmail.com
# 2016/12/23
# 1.0

function pgShop_checkShopDomain( $domain ){
	
	$dtDN = ".postgah.com"; // dot domain
	$dtDL = strlen($dtDN);

	if( $domain != mb_ereg_replace( '[^a-z0-9\.\-]+', '', $domain ) ){
		dg();

	} else if( strlen($domain) <= $dtDL ){
		dg();

	} else if( substr( $domain , -1 * $dtDL ) != $dtDN ){
		dg();
	
	} else if(! $sub = substr( $domain , 0, -1 * $dtDL ) ){
		dg();

	} else if( $sub != mb_ereg_replace( '[^a-z0-9]+', '', $sub ) ){
		dg();

	} else {
		return true;
	}

	return false;

}




