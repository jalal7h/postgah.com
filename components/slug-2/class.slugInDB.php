<?php

# jalal7h@gmail.com
# 2017/05/15
# 1.0

/**
* 
*/
class slugInDB
{
	

	public static function set( $name, $slug, $path ){
		
		#
		# edit
		if( $rw_s = table( 'slug', [ 'name'=>$name ] ) ){
			dbs( 'slug', [ 'slug'=>$slug, 'path'=>$path ] , [ 'name'=>$name ] );

		#
		# new
		} else {
			dbs( 'slug', [ 'slug'=>$slug, 'path'=>$path, 'name'=>$name ]);		
		}

	}


	public static function remove( $name ){
		dbrm( 'slug', [ 'name'=>$name ] );
	}


}




