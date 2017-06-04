<?

function pgItem_isActive( $rw ){

	if(! pgItem_isVerified($rw) ){
		return false;

	} else if( pgItem_isExpired($rw) ){
		return false;

	} else {
		return true;
	}

}

