<?php

# jalal7h@gmail.com
# 2017/06/16
# 1.0

function is_json( $str ){

	if(! is_string($str) ){
		return false;
	}

	json_decode($str);

	if( json_last_error() !== 0 ){
		return false;
	}

	return true;

}

