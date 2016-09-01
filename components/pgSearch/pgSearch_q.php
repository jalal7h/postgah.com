<?

# jalal7h@gmail.com
# 2016.08.31
# 1.0

function pgSearch_q(){
	
	$q = $_REQUEST['q'];
	$q = mb_ereg_replace( '[^A-Za-z0-9آ-ی ]+', '', $q );
	$q = trim($q);

	return $q;

}

