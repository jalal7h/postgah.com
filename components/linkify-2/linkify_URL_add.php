<?php

# jalal7h@gmail.com
# 2017/01/06
# 1.0

function linkify_URL_add( $the_url ){
	
	if( substr( $the_url, 0, strlen(_URL) ) == _URL ){
		$the_url = '{_URL}'.substr( $the_url, strlen(_URL) );
	}

	return $the_url;

}



