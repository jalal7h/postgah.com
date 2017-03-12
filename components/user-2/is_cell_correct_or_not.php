<?

# jalal7h@gmail.com
# 2016/12/02
# 1.1

function is_cell_correct_or_not( $numb ){
	
	$numb = mb_ereg_replace('[^0-9\+]+','',$numb);
	$numb = trim( $numb );

	# ! if nothing
	if(! $numb ){
		return false;
	}

	# fix: 912 => 0912
	if( substr($numb,0,1) == '9' ){
		$numb = '0'.$numb;
	}

	# fix: +980912 => 0912, +98912 => 0912
	if( substr($numb,0,3) == '+98' ){
		if( substr($numb, 3, 1) == '0' ){
			$numb = substr($numb,3);
		} else {
			$numb = '0'.substr($numb,3);
		}
	}

	# ! if the first number is not 0
	if( substr($numb, 0, 1) != '0' ){
		return false;
	}

	# if its does not have enough number
	if( strlen($numb) != 11 ){
		return false;
	}

	return $numb;

}








