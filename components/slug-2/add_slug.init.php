<?php

# jalal7h@gmail.com
# 2017/04/26
# 1.2

/*
 add_slug( 'ticket-$-$.html' , './?page=66&ticket_id={$1}' );
 add_slug([
	'ticket' => [ './?page=11', 'TICKET' ],
 ]);
 */

function add_slug( $slug_string , $slug_path=null, $slug_name=null ){
	
	if( is_array($slug_string) ){
		foreach( $slug_string as $this_slug_string => $this_slug_path ){
			add_slug( $this_slug_string , $this_slug_path );
		}
		return true;
	}
	
	if( is_array($slug_path) ){
		$slug_name = $slug_path[1];
		$slug_path = $slug_path[0];
	}

	#
	# fix slug path
	if( substr($slug_path,0,2) == './' ){
		$slug_path = substr($slug_path,2);
	} else if( substr($slug_path,0,1) == '/' ){
		$slug_path = substr($slug_path,1);
	}

	
	if(! $slug_string = trim($slug_string) ){
		e( $slug_string . " -  " . $slug_path );

	} else if(! $slug_path = trim($slug_path) ){
		e( $slug_string . " -  " . $slug_path );

	} else {
		$GLOBALS['slug'][ $slug_string ] = $slug_path;
		if( $slug_name ){
			$GLOBALS['slug_name'][ $slug_string ] = $slug_name;
		}
	}

}



