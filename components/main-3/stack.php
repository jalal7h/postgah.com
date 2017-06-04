<?php

# jalal7h@gmail.com
# 2017/03/04
# 1.0

class stack
{
	

	static public function add( $slug, $func, $i=null ){
		
		if( $i === null ){
			$GLOBALS['___STACK___'][ $slug ][] = $func;
		
		} else if( isset( $GLOBALS['___STACK___'][ $slug ][ $i ] ) ){
			if( $GLOBALS['___STACK___locked'][ $slug ][ $i ] == '1' ){
				echo "The stack number $i is locked for ".$GLOBALS['___STACK___'][ $slug ][ $i ].".";
				die();
			} else {
				$GLOBALS['___STACK___'][ $slug ][] = $GLOBALS['___STACK___'][ $slug ][ $i ];
			}
			$GLOBALS['___STACK___'][ $slug ][ $i ] = $func;
			$GLOBALS['___STACK___locked'][ $slug ][ $i ] = '1';
		}

	}


	static public function run( $slug ){
		
		if(! $func_arr = $GLOBALS['___STACK___'][ $slug ] ){
			return false;
		
		} else foreach ( ksort($func_arr) as $func ) {
			call_user_func( $func );
		}
		
	}
	
	
}


