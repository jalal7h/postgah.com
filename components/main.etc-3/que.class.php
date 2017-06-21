<?php

# jalal7h@gmail.com
# 2017/06/16
# 1.3

/**
* que : some place to push some content, and use it later
* ::push ( only this process )
* ::ppush ( chache it, for 1 hour )
*/
class que {


	public static function push( $name, $value=':::non::value::inserted:::' ){

		# auto key generation
		if( $value == ':::non::value::inserted:::' ){
			$value = $name;
			$name = md5x( $name.time(NULL) );
		}

		$GLOBALS['que'][ $name ] = $value;
		$_SESSION['que'][ $name ] = $value;

		return $name;

	}
	

	public function ppush( $name, $value=':::non::value::inserted:::' ){
		
		if(! cache_enabled() ){
			echo convbox( __('لطفا سرویس cache را فعال کنید') , 'red');
			return false;
		}

		# auto key generation
		if( $value == ':::non::value::inserted:::' ){
			$value = $name;
			$name = md5x( $name.time(NULL) );
		}

		cache( "make", session_id().$name, $value );

		return $name;

	}


	public static function is( $name ){
		
		if( self::get( $name ) ){
			return true;
		
		} else {
			return false;
		}

	}


	public static function get( $name ){

		if( $GLOBALS['que'] and array_key_exists($name, $GLOBALS['que']) ){
			return $GLOBALS['que'][ $name ];

		} else if( $_SESSION['que'] and array_key_exists($name, $_SESSION['que']) ){
			return $_SESSION['que'][ $name ];
			
		} else {
			return cache( "hit", session_id().$name );
		}

	}


	public static function pop( $name ){
		
		$value = self::get( $name );
		self::remove( $name );

	}


	public static function remove( $name ){

		unset( $GLOBALS['que'][ $name ] );
		unset( $_SESSION['que'][ $name ] );
		cache( "remove", session_id().$name );

	}


}

