<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.0

function watermark_make( $photo, $watermark, $save_to=null ){

	// Load the stamp and the photo to apply the watermark to
	$im = imagecreatefrom($photo);
	$watermark = imagecreatefrom($watermark);

	// Set the margins for the stamp and get the height/width of the stamp image
	$marge_right = 20;
	$marge_bottom = 20;
	$sx = imagesx($watermark);
	$sy = imagesy($watermark);

	// Copy the stamp image onto our photo using the margin offsets and the photo 
	// width to calculate positioning of the stamp. 
	imagecopy($im, $watermark, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermark), imagesy($watermark));

	// Output and free memory
	if(! $save_to ){
		header('Content-type: image/png');
	}
	imagepng($im, $save_to);
	imagedestroy($im);

	return $save_to;

}

