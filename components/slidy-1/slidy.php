<?

# jalal7h@gmail.com
# 2017/06/04
# 1.3

function slidy( $arr ){

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
			list( $width, $height ) = getimagesize($image);
			$images[] = (object) [ 'src'=> $image, 'width'=>$width, 'height'=>$height, 'numb'=>( $i+1 ) ];
		}

		return template_engine( 'slidy', [ 'images' => $images ] );

	}
	
	return false;

}

