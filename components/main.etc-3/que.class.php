<?php

# jalal7h@gmail.com
# 2017/04/02
# 1.1

/**
* que : some place to push some content, and use it later
*/
class que {

	public static function push( $name, $value ){
		$GLOBALS['que'][ $name ] = $value;
	}
	
	public function ppush( $name, $value ){
		redis( $name, $value );
	}

	public static function is( $name ){
		if( $GLOBALS['que'] and array_key_exists($name, $GLOBALS['que']) ){
			return true;
		} else if( $_SESSION['que'] and array_key_exists($name, $_SESSION['que']) ){
			return true;
		} else if( redis($name) ){
			return true;
		} else {
			return false;
		}
	}

	public static function pop( $name ){

		if( $GLOBALS['que'] and array_key_exists($name, $GLOBALS['que']) ){
			$value = $GLOBALS['que'][ $name ];
			unset( $GLOBALS['que'][ $name ] );
			return $value;

		} else if( $_SESSION['que'] and array_key_exists($name, $_SESSION['que']) ){
			$value = $_SESSION['que'][ $name ];
			unset( $_SESSION['que'][ $name ] );
			return $value;
			
		} else if( $value = redis($name) ){
			redis_remove($name);
			return $value;

		} else {
			return dg( __CLASS__."::".__FUNCTION__."; the key ".$name." does not exists");
		}

	}



}

