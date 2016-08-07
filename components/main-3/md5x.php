<?php

function md5x( $string , $length=32 ){

	$md5x = md5( "::" . _URL . $string . $length );
	$md5x = substr( $md5x , 0 , $length );

	return $md5x;
}