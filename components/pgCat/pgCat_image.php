<?

function pgCat_image( $rw, $size=null ){
	
	// $pgCat_image = 'data/cat_memo/'.rand(101,116).'.png';

	if( $size ){
		$pgCat_image = _URL."/resize/$size/$pgCat_image";
	}

	return $pgCat_image;

}


