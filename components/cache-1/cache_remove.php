<?

# jalal7h@gmail.com
# 2016/08/31
# 1.1

# cache_remove( $key );

/*REMOVE*/

function cache_remove( $key ){

	$path = cache_path( $key );

	if( file_exists($path) ){
		unlink( $path );
	}

}

