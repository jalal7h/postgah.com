<?

function pgItem_saleByPostgah( $rw ){

	if(! pgItem_isVerified($rw) ){
		return false;
	
	} else if( $rw['sale_by_postgah'] != 1 ){
		return false;
	
	} else {
		return true;
	}

}

