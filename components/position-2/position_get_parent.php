<?php

# jalal7h@gmail.com
# 2017/01/23
# 1.0

/* ************************ *\
 * input : child id         *
 * output : rw for parent   *
\* ************************ */
function position_get_parent( $id ){
	
	$rw = table('position',$id);
	
	$the_parent = $rw['parent'];
	$rw_parent = table('position',$the_parent);

	return $rw_parent;

}

