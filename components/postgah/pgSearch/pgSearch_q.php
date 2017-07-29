<?

# jalal7h@gmail.com
# 2017/07/29
# 1.4

function pgSearch_q(){
	
	if(! $q = $_POST['q'] ){
		// e();

	} else if(! $q = rawurldecode($q) ){
		e();

	} else if(! $q = mb_ereg_replace( '[^A-Za-z\-\+0-9آ-ی ]+', '', $q ) ){
		// e();

	} else if(! $q = trim($q) ){
		// e();
		
	} else {
		return $q;
	}

	return '';

}

