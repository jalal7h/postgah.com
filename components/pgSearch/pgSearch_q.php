<?

# jalal7h@gmail.com
# 2016/01/02
# 1.2

function pgSearch_q(){
	
	if(! $q = $_GET['q'] ){
		// e();

	} else if(! $q = rawurldecode($q) ){
		e();

	// } else if(! $q = mb_ereg_replace( '[^A-Za-z0-9آ-ی ]+', '', $q ) ){
	//	e();

	} else if(! $q = trim($q) ){
		e();
		
	} else {
		return $q;
	}

	return '';

}

