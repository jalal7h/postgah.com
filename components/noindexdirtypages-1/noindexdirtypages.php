<?php

# jalal7h@gmail.com
# 2017/01/01
# 1.1

function noindexdirtypages(){

	$meta = "<meta name=\"googlebot\" content=\"noindex,nofollow\">";
	$meta.= "\n\t";
	$meta.= "<meta name=\"robots\" content=\"noindex,nofollow\">";
	$meta.= "\n";


	if( in_array( _PAGE, [ 'admin', 14, 58, 59, 60, 63 ] ) ){
		return $meta;

	} else if( is_userpanel() ){
		return $meta;
	
	} else if( is_admin() ){
		return $meta;

	} else if( strstr( _FULL_URL , '?') or ( str_replace('/', '', canonical_link() ) != str_replace('/', '', _FULL_URL) ) ){
		echo canonical_link()." - "._FULL_URL."\n";
		return $meta;
	
	} else {
		return '';
	}

}

