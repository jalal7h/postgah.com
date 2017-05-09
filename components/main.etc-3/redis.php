<?php 

# jalal7h@gmail.com
# 2017/05/09
# 1.2

function redis( $key, $value=null ){

	$key = session_id() . $key;
	
	// if( class_exists('Redis') ){

		$redis = new Redis(); 
		$redis->connect('127.0.0.1', 6379); 
		
		if( $value !== null ){
			$redis->set( $key, $value);
		}
		
		return $redis->get( $key ); 


	// } else if( $value ) {
	// 	return cache( "make", "redis_replacement_".$key, $value );
	
	// } else {
	// 	return cache( "hit", "redis_replacement_".$key );
	// }


}



