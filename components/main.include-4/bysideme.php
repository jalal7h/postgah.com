<?php

# jalal7h@gmail.com
# 2017/06/04
# 1.0

function bysideme( $dir=null, $global=true ){

	if(! $dir ){
		
		// echo "\n\n";
		// echo debug_backtrace()[0]['function']."\n";
		// echo debug_backtrace()[1]['function']."\n";
		// echo debug_backtrace()[2]['function']."\n";
		// echo "\n\n";

		if( debug_backtrace()[1]['function'] == 'bysideme_local' ){
			$file = debug_backtrace()[1]['file'];
		
		} else {
			$file = debug_backtrace()[0]['file'];
		}

		$dir = dirname($file);

	}

	if( $global ){
		$url = _URL . '/';
	}

	$url.= 'components/' . explode('components/', $dir )[1];

	return $url;

}


function bysideme_local( $dir=null ){
	
	return bysideme( $dir, $global=false );
	
}


