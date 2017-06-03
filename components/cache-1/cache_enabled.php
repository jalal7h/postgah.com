<?php

# jalal7h@gmail.com
# 2017/06/03
# 1.0

function cache_enabled(){
	
	if( !defined('cache') ){
		return false;

	} else if( cache === false ){
		return false;

	} else {
		return true;
	}

}

