<?php

# jalal7h@gmail.com
# 2017/03/12
# 1.0

function userverification_cell_keyGenerateNew(){
	
	$_SESSION['userverification_cell_keyGenerate_time'] = U();
	
	$rand = rand( 1000 , 9999 );
	$_SESSION['userverification_cell_keyGenerate'] = $rand;
	
	return $rand;
	
}

