<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

define( 'userverification_cell_deadline' , 300 );

function userverification_cell_keyTimeRemined(){
	
	if(! $_SESSION['userverification_cell_keyGenerate_time'] ){
		$remaining_time = 0;

	} else {
		
		$passed_time = U() - $_SESSION['userverification_cell_keyGenerate_time'];
		$remaining_time = userverification_cell_deadline - $passed_time;

		if( $remaining_time < 0 ){
			$remaining_time = 0;
		}
		
	}

	return $remaining_time;

}

