<?php

# jalal7h@gmail.com
# 2017/01/03
# 1.3

add_headtag( 'noindexdirtypages' );

function noindexdirtypages(){

	$meta = "<meta name=\"googlebot\" content=\"noindex,nofollow\">";
	$meta.= "\n\t";
	$meta.= "<meta name=\"robots\" content=\"noindex,nofollow\">";
	$meta.= "\n";


	if( _PAGE == 'admin' or ( noindex_pages() and in_array( _PAGE, noindex_pages() ) ) ){
		return $meta;

	} else if( is_userpanel() ){
		return $meta;
	
	} else if( is_admin() ){
		return $meta;

	} else if( strstr( _FULL_URL , '?') ){
		return $meta;
	
	} else if( is_component('canonical') and ( str_replace('/', '', Canonical::link() ) != str_replace('/', '', _FULL_URL) ) ){
		return $meta;

	} else {
		return '';
	}

}




