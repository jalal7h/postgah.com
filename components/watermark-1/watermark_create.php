<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.0

function watermark_create( $photo, $watermark ){
	
	$dir = 'data/watermark';
	
	if(! file_exists($dir) ){
		mkdir($dir);
	}

	$save_to = $photo.'-'.$watermark;
	$save_to = md5($save_to);
	$save_to = $dir.'/'.$save_to.'.png';

	return watermark_make( $photo, $watermark, $save_to );
	
}

