<?php

# jalal7h@gmail.com
# 2017/06/15
# 1.1

function resize_cut( $addr, $new_w, $new_h, $destionation_path ){
	
	$ext = fileext($addr);

	if( $ext == 'jpg' ){
		$ext = 'jpeg';
	}

	if(! in_array( $ext, [ 'jpeg', 'gif', 'png' ] ) ){
		ed();
	}

	list( $image_w, $image_h ) = getimagesize( $addr );

	#
	# fix
	if( $new_w > $image_w ){
		$new_w = $image_w;
	}
	if( $new_h > $image_h ){
		$new_h = $image_h;
	}

	$new_x = ( $new_w == $image_w ) ? 0 : ceil( ($image_w - $new_w) / 2 );
	$new_y = ( $new_h == $image_h ) ? 0 : ceil( ($image_h - $new_h) / 2 );

	$func_image = 'image'.$ext;

	$im = imagecreatefrom( $addr );
	$im2 = imagecrop( $im, [ 'x' => $new_x, 'y' => $new_y, 'width' => $new_w, 'height' => $new_h ] );
	
	if( $im2 === FALSE ){
		return e();
	}
	
	$func_image( $im2, $destionation_path );

}

