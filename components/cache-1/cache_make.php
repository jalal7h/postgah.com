<?

# jalal7h@gmail.com
# 2016/08/31
# 1.1

/*README*/

function cache_make( $key, $value, $date=null ){
	
	if( debug_backtrace()[1]['function'] != 'cache' ){
		echo "direct call of `".__FUNCTION__."()` is not valid";
		die();
	}

	if(! $value = trim($value) ){
		//
	
	} else {

		cache_remove( $key );
		
		$path = cache_path( $key, $make=true );
		file_put_contents( $path, $value );

		if( _cache_debug===true ){
			echo "<hr>make: $path<hr>";
		}

	}

	return $value;

}

