<?php

# jalal7h@gmail.com
# 2017/05/10
# 1.0

/**
* 
*/
class CacheRedis {
	
	private static $default_server = '127.0.0.1';
	private static $default_port = 6379;
	private static $redis;

	static private function Connect() {

		if(! $server = cache_redis_server ){
			$server = self::$default_server;
		}
		if(! $port = cache_redis_port ){
			$port = self::$default_port;
		}

    	self::$redis = new Redis();
   		self::$redis->connect( $server, $port );

    }


	/**
	* 
	*/
	static public function Make( $key, $value /*, $timeout=null*/ ){

		self::Connect();

		self::$redis->set( $key, $value);

		// if( $timeout ){
			// self::$redis->setTimeout( $key, $timeout );
		
		// } else {
			self::$redis->set( "creation_date_of_" . $key, time(NULL) );
		// }

		return self::$redis->get( $key );

	}


	/**
	* 
	*/
	static public function Hit( $key, $timeout=null ){	
		
		self::Connect();
		
		if( $timeout ){
			$creation_date = self::$redis->get( "creation_date_of_" . $key );
			if( $creation_date + $timeout < time(NULL) ){
				return false;
			}
		}

		return self::$redis->get( $key );

	}


	/**
	* 
	*/
	static public function Remove( $key ){
		self::Connect();
		self::$redis->delete( $key );
	}


}






