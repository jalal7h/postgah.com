<?

# jalal7h@gmail.com
# 2017/05/10
# 2.0

# $task [ make / hit / remove / pop ]

# cache( "make", __FUNCTION__.$rw_pagelayer, "some_content" );
# cacle( "make", $some_key, $some_value );

# cache( "make", "[cat_id,p,ccf_*]", "some_content" ); // $_REQUEST['cat_id'].$_REQUEST['p']....
# cache( "hit", "the_key", "3600/3600second/10minute/6hour/2day/3week/3month/3season/1year/null" );
# cache( "remove", "the_key" );

# ..............................

# $cache_key = "[cat_id,ccf_*]";

# if( $cache_hit = cache( "hit", $cache_key, "2hours" ) ){
# 	echo $cache_hit;
#
# } else {
#	$cache_value = "something";
#	echo cache( "make", $cache_key, $cache_value );
# }

/*README*/

function cache( $task, $key, $value_or_timeout=""){
	
	if( cache === true ){
		
		$key = cache_keycheck( $key );

		$class = 'Cache' . ucfirst(cache_type);
		if(! class_exists($class) ){
			dg('cache type '.cache_type.' not found!');
			$class = 'CacheFile';
		}

		switch ($task) {
			
			case 'remove':
				return $class::Remove( $key );
				
			case 'make':
				$value = $value_or_timeout;
				return $class::Make( $key, $value );

			case 'hit':
				$timeout = $value_or_timeout;
				return $class::Hit( $key, $timeout );

			case 'pop':
				$timeout = $value_or_timeout;
				if( $value = $class::Hit( $key, $timeout ) ){
					$class::Remove( $key );
				}
				return $value;

		}

	} else if( $task == 'make' ){
		return $value_or_timeout;
	}

}

