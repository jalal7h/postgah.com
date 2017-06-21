<?php

# jalal7h@gmail.com
# 2017/06/16
# 1.1

/**
* 
*/
class CacheFile {
	
	/**
	* 
	*/
	static public function Make( $key, $value ){

		if( is_array($value) or is_object($value) ){
			$value = json_encode( $value );
		}

		if( $value = trim($value) ){		

			self::remove( $key );
			$path = self::Path( $key, $make=true );
			file_put_contents( $path, $value );

			dg("<hr>make: $path<hr>");
			
		}

		return $value;

	}


	/**
	* 
	*/
	static public function Hit( $key, $timeout_mix=null ){

		if( debug_backtrace()[1]['function'] != 'cache' ){
			ed( "direct call of `".__FUNCTION__."()` is not valid" );
		}

		$now = time(NULL);
		$timeout = cache_hit_timeout_to_second( $timeout_mix );
		$valid_date = $now - $timeout;

		$path = self::Path( $key );
		
		if(! file_exists($path) ){
			return false;

		} else if( $timeout_mix and ( filemtime($path) <= $valid_date ) ){
			self::remove( $key );
			return false;

		} else {
			dg( "<hr>hit: $path<hr>" );
			$value = file_get_contents( $path );
			if( is_json($value) ){
				$value = json_decode( $value );
			}
			return $value;
		}
		
	}


	/**
	* 
	*/
	static public function Remove( $key ){
		
		$path = self::Path( $key );

		if( file_exists($path) ){
			unlink( $path );
		}

	}


	/**
	* 
	*/
	static private function Path( $key, $make=false ){

		$path = 'data/cache';
		$sha1 = sha1( $key );

		if( $make and !file_exists($path) ){
			mkdir($path);
		}

		$dir = substr($sha1, -3);
		$path.= "/".$dir;
		if( $make and !file_exists($path) ){
			mkdir( $path );
		}

		$dir = substr($sha1, -6, -3);
		$path.= "/".$dir;
		if( $make and !file_exists($path) ){
			mkdir( $path );
		}

		$dir = substr($sha1, -9, -6);
		$path.= "/".$dir;
		if( $make and !file_exists($path) ){
			mkdir( $path );
		}

		$dir = substr($sha1, -12, -9);
		$path.= "/".$dir;
		if( $make and !file_exists($path) ){
			mkdir( $path );
		}

		$path.= "/".$sha1;

		return $path;

	}


}








