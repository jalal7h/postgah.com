<?

# jalal7h@gmail.com
# 2016/08/31
# 1.1

# it will hash the key, and makes some suitable path that
/*README*/

function cache_path( $key, $make=false ){
	
	$path = _cache_dir;
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

