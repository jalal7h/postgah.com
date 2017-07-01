<?php

# jalal7h@gmail.com
# 2017/07/01
# 1.0

function pgItem_isPremium( $rw ){

	if( is_numeric($rw) ){
		if(! $rw = table('item', $rw) ){
			return false;
		}
	}

	if( $rw['plan'] == 0 ){
		return false;
	
	} else {
		return true;
	}

}

