<?php 

# jalal7h@gmail.com
# 2017/03/12
# 1.0

function redis( $key, $value=null ){
	
	$redis = new Redis(); 
	$redis->connect('127.0.0.1', 6379); 
	
	if( $value !== null ){
		$redis->set( $key, $value);
	}
	
	return $redis->get( $key ); 

}



