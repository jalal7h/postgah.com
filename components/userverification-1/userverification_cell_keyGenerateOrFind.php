<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

function userverification_cell_keyGenerateOrFind(){

	if( userverification_cell_keyTimeRemined() > 0 ){
		return userverification_cell_keyCurrent();
	
	} else {
		que::push( 'userverification_cell_keyGenerateOrFind_thisIsNew', 1 );
		return userverification_cell_keyGenerateNew();
	}
	
}

