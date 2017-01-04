<?php

# jalal7h@gmail.com
# 2017/01/04
# 1.1

// add_init( 'init_etc', 3 );
// add_init( function(){ something }, 2 );

function add_init( $init_func, $i=null ){
	
	if( !is_closure($init_func) and (! $init_func = trim($init_func) ) ){
		e();

	} else 
	if( ($i === null) or !is_numeric($i) ){
		$GLOBALS['do_init'][] = $init_func;
		
	} else {
		if( isset( $GLOBALS['do_init'][ $i ] ) ){
			if( $GLOBALS['do_init_locked'][ $i ] == '1' ){
				echo "The init number $i is locked for ".$GLOBALS['do_init'][ $i ].".";
				die();
			} else {
				$GLOBALS['do_init'][] = $GLOBALS['do_init'][ $i ];
			}
		}
		$GLOBALS['do_init'][ $i ] = $init_func;
		$GLOBALS['do_init_locked'][ $i ] = '1';
	}

}



