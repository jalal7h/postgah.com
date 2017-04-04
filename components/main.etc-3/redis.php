<?php 

# jalal7h@gmail.com
# 2017/04/02
# 1.1

function redis( $key, $value=null ){

	$key = session_id() . $key;
	
	$redis = new Redis(); 
	$redis->connect('127.0.0.1', 6379); 
	
	if( $value !== null ){
		$redis->set( $key, $value);
	}
	
	return $redis->get( $key ); 

}



