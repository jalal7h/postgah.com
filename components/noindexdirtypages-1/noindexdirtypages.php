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

	if( d404_flag === true ){
		return $meta;

	} else if( _PAGE == 'admin' ){
		return $meta;

	} else if( is_userpanel() ){
		return $meta;
	
	} else if( is_admin() ){
		return $meta;

	} else if( strstr( _FULL_URL , '?') ){
		return $meta;
	
	} else if( ( sizeof($_GET) == 1 ) and dbr( dbq(" SELECT COUNT(*) FROM `page` WHERE `id`='"._PAGE."' AND `ignore_in_sitemap`='1' LIMIT 1 "), 0, 0) == 1 ){
		return $meta;

	} else if( is_component('canonical') and $canonical = Canonical::link() ){
		if( str_replace('/', '', $canonical ) != str_replace('/', '', _FULL_URL) ){
			return $meta;
		}
	
	
	} else {
		//
	}

	return '';

}




