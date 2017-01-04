<?

# jalal7h@gmail.com
# 2017/01/04
# 1.0

function meta_67(){

	if( d404_flag === true ){
		$title = "404. Not Found !";

	} else if(! $q = pgSearch_q() ){
		e();

	} else {
		$title = $q;
		$kw = str_replace( ' ', ',', $q );
		$desc = $q;
	}

	return [ 
		'title' => $title ,
		'kw' => $kw ,
		'desc' => $desc ,
	];

}