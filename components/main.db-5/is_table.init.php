<?php

# jalal7h@gmail.com
# 2017/06/09
# 1.3

function is_table( $table ){
	
	if( $table == '' ){
		return false;
	
	} else if(! $array_set = get_tables() ){
		return false;

	} else if(! in_array( $table, $array_set ) ){
		return false;
	
	} else {
		return true;
	}

}



