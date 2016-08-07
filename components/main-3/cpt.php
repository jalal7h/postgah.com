<?php

function cpt( $string, $dynamic=false ){
	
	// return $string;
	
	if( $dynamic ){
		$string = date( "Ymd", U() ).$string;
	}
	$string = sha1($string);
	$string = md5($string."mc");
	
	$string = md5x( $string, 20 );

	return $string;	

}











