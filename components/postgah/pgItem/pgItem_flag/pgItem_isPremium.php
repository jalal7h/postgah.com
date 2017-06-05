<?

function pgItem_isPremium( $rw ){

	if( $rw['plan'] == 0 ){
		return false;
	
	} else {
		return true;
	}

}

