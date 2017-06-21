<?php

# jalal7h@gmail.com
# 2017/06/15
# 1.0

add_action('resize_action');

function resize_action(){

	if(! $addr = trim($_REQUEST['address']) ){
		e();

	} else if(! $width = intval($_REQUEST['width']) ){
		e();

	} else if(! $height = intval($_REQUEST['height']) ){
		e();
	}

	$il = 'image_list';
	$ill = strlen($il);

	if( substr( $addr, 0, $ill+1 ) == $il.'/' ){
		if(! $filename = trim( substr( $addr, $ill+1) ) ){
			d404();
		} else {
			$addr = image_list( $filename );
		}
	}

	if( $_REQUEST['cut'] == '1'	){
		$resized = resize_image( $addr, $width, $height, $cut=true );

	} else {
		$resized = resize_image( $addr, $width, $height, $cut=false );
	}

	imagedump( $resized );

}



