<?php

# jalal7h@gmail.com
# 2017/01/30
# 1.0

/* ******************************* *\
 * input : parent id               *
 * output : array of rw for childs *
\* ******************************* */
function position_get_childs( $id ){
		
	return table( 'position', ['parent'=>$id] );
	
}

