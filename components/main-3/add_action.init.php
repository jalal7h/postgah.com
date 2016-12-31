<?php

# jalal7h@gmail.com
# 2016/12/28
# 1.0

function add_action( $func_name ){
	
	$GLOBALS['do_action'][] = $func_name;

}

