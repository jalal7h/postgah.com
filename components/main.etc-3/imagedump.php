<?php

# jalal7h@gmail.com
# 2017/06/13
# 1.0

function imagedump( $image_path ){
	
	$image_path;
	$ex = fileext($image_path);

	switch( $ex ){
	
		case 'jpg' : 
		case 'jpeg' :
			$func_show = "imagejpeg";
			break;
		
		case 'bmp' : 
			$func_show = "imagewbmp";
			break;
		
		case 'gif' : 
			$func_show = "imagegif";
			break;
		
		case 'png' : 
		default : 
			$func_show = "imagepng";
			break;
	}
	
	header("Content-disposition: inline; filename=".basename($image_path));
	header('Content-Type: image/'.$ex );
	$expires = 60 * 60 * 24 * 30;
	$exp_gmt = gmdate("D, d M Y H:i:s", U() + $expires )." GMT";
	$mod_gmt = gmdate("D, d M Y H:i:s", U() + (3600 * -5 * 24 * 365) )." GMT";
	@header("Expires: {$exp_gmt}");
	@header("Last-Modified: {$mod_gmt}");
	@header("Cache-Control: public, max-age={$expires}");
	@header("Pragma: !invalid");

	echo file_get_contents($image_path);
	die();

}

