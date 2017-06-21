<?php

# jalal7h@gmail.com
# 2017/06/13
# 1.0

function mkdirs( $dir_s ){
	
	if( file_exists($dir_s) ){
		return true;
	
	} else {
		return mkdir( $dir_s, 0755, true );
	}
	
}

