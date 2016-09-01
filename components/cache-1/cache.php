<?

# jalal7h@gmail.com
# 2016/08/31
# 1.0

# cache( $task, $key, $value="", $date=null ) 
# $task [ make / hit / remove ]


# cache( "make", __FUNCTION__.$rw_pagelayer, "some_content" );

# cache( "make", "[cat_id,p,ccf_*]", "some_content" );
# cache( "hit", "the_key", "3600/3600second/10minute/6hour/2day/3week/3month/3season/1year/null" );
# cache( "remove", "the_key" );

/*

$cache_key = "[cat_id,ccf_*]";

if( $cache_hit = cache( "hit", $cache_key, "2hours" ) ){
	echo $cache_hit;
	
} else {
	$cache_value = "something";
	echo cache( "make", $cache_key, $cache_value );
}

*/

/*README*/

function cache( $task, $key, $value_or_timeout=""){
	
	if( _cache_flag===true ){
		
		$key = cache_keycheck( $key );

		switch ($task) {
			
			case 'remove':
				return cache_remove( $key );
				
			case 'make':
				$value = $value_or_timeout;
				return cache_make( $key, $value );

			case 'hit':
				$timeout = $value_or_timeout;
				return cache_hit( $key, $timeout );
			
		}

	} else if( $task == 'make' ){
		return $value_or_timeout;
	}

}

