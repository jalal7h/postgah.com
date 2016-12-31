<?php

# jalal7h@gmail.com
# 2016/12/28
# 1.0

// add_init( 'init_etc', 3 );

function add_init( $init_func, $i=null ){
	
	if(! $init_func = trim($init_func) ){
		e();

	} else {

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

}



