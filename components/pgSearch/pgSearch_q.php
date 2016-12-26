<?

# jalal7h@gmail.com
# 2016/12/26
# 1.1

function pgSearch_q(){
	
	$q = $_GET['q'];
	$q = rawurldecode($q);
	// $q = mb_ereg_replace( '[^A-Za-z0-9آ-ی ]+', '', $q );
	$q = trim($q);

	// echo $q;die();

	return $q;

}

