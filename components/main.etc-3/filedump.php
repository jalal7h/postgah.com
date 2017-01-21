<?php

# jalal7h@gmail.com
# 2017/01/20
# 1.0

function filedump( $file_content, $ext ){
	
	#
	# the key
	$dump_name = md5x($file_content,12) .".". $ext;

	# 
	# the main dump dir
	$file_path = 'data/filedump';
	if(! file_exists($file_path) ){
		mkdir($file_path);
	}

	# 
	# d1
	$d = substr($dump_name,0,3);
	$file_path.= '/'.$d;
	if(! file_exists($file_path) ){
		mkdir($file_path);
	}

	# 
	# d2
	$d = substr($dump_name,3,3);
	$file_path.= '/'.$d;
	if(! file_exists($file_path) ){
		mkdir($file_path);
	}

	# 
	# d3
	$d = substr($dump_name,6,3);
	$file_path.= '/'.$d;
	if(! file_exists($file_path) ){
		mkdir($file_path);
	}

	#
	# put file
	$file_path.= '/'.substr($dump_name,9);
	if(! file_exists($file_path) ){
		file_put_contents( $file_path, "\xEF\xBB\xBF".$file_content );
	}

	#
	# return the key
	return $file_path;

}

