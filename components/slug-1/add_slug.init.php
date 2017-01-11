<?php

# jalal7h@gmail.com
# 2016/12/30
# 1.1

/*
 add_slug( 'ticket-$-$.html' , './?page=66&ticket_id={$1}' );
 */

function add_slug( $slug_string , $slug_path=null ){
	
	if( is_array($slug_string) ){
		foreach( $slug_string as $this_slug_string => $this_slug_path ){
			add_slug( $this_slug_string , $this_slug_path );
		}

	} else if(! $slug_path ){
		e();
	
	} else if(! $slug_string = trim($slug_string) ){
		e( $slug_string . " -  " . $slug_path );

	} else if(! $slug_path = trim($slug_path) ){
		e( $slug_string . " -  " . $slug_path );

	} else {
		$GLOBALS['slug'][ $slug_string ] = $slug_path;
	}

}



