<?

# jalal7h@gmail.com
# 2016/09/02
# 1.1

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
		// e(__FUNCTION__,__LINE__);

	} else if(! sizeof($arr) ){
		e(__FUNCTION__,__LINE__);

	} else {

		foreach ($arr as $i => $image) {
			$size = getimagesize($image);
			$list_of_images.= "<img src=\"$image\" numb=\"".($i+1)."\" width=\"".$size[0]."\" height=\"".$size[1]."\" />";
		}

		$c = "
		<div class=\"slidy\" min_wh=\"".$min_wh."\">
			<div class=\"main\">
				$list_of_images
			</div>
			<div class=\"tumb\">
				$list_of_images
			</div>
		</div>\n";

		return $c;

	}
	
	return false;

}

