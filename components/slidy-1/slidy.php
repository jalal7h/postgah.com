<?php

# jalal7h@gmail.com
# 2017/06/23
# 1.4

function slidy( $arr, $option=null ){

	if( !$arr or !sizeof($arr) ){
		return false;
	}

	# fix array index
	foreach( $arr as $i0 => $img0 ){
		$arr2[] = $img0;
	}
	$arr = $arr2;
	#

	if(! is_array($arr) ){
		// e();

	} else if(! sizeof($arr) ){
		e();

	} else {

		foreach ($arr as $i => $image) {
			if( file_exists($image) ){
				list( $width, $height ) = getimagesize($image);
				$images[] = (object) [ 'src'=> $image, 'width'=>$width, 'height'=>$height, 'numb'=>( $i+1 ) ];
			}
		}

		if( $option ){
			$option = (object) $option;
		}

		return template_engine( 'slidy', [ 'images' => $images, 'option'=>$option ] );

	}
	
	return false;

}

