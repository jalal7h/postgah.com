<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.0

function imagecreatefrom( $file ){
	
	$ex = strrchr( $file, '.' );
	$ex = substr( $ex, 1 );
	$ex = strtolower($ex);

	switch ($ex) {

		case 'jpg':
		case 'jpeg':
			return imagecreatefromjpeg( $file );
		
		case 'png':
			return imagecreatefrompng( $file );
		
		case 'gif':
			return imagecreatefromgif( $file );
		
		case 'bmp':
			return imagecreatefrombmp( $file );

	}

}

