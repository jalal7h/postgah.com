<?php

# jalal7h@gmail.com
# 2016/12/03
# 2.4

# supports 72 characters
/*README*/

function md5x( $string , $length=40, $dynamic=false , $url=false ){
	
	if( $dynamic ){
		$string.= date("Ymd");
	}
	
	$md5x = md5( "::" . ( $url ? _URL.mysql_database : '' ) . $string . $length );
	$md5x.= sha1( "::" . ( $url ? _URL.mysql_database : '' ) . $string . $length );
	$md5x = substr( $md5x , 0 , $length );
	
	return $md5x;
	
}
