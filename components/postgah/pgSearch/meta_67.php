<?php

# jalal7h@gmail.com
# 2017/01/14
# 1.0

function meta_67(){

	if(! $q = pgSearch_q() ){
		e();

	} else {
		$title = $q;
		$kw = str_replace( ' ', ',', $q );
		$desc = $q;
	}

	return [ 
		'title' => $title ,
		'kw' => $kw ,
		// 'desc' => $desc ,
	];

}
