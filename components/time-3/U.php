<?

# jalal7h@gmail.com
# 2016/11/08
# 1.0

function U(){
	
	$U = gmdate("U");
	
	if( ( gmdate("z") > 78 ) and ( gmdate("z") < 264 ) ){
		$U+= 4.5 * 3600;

	} else {
		$U+= 3.5 * 3600;
	}
	
	return $U;

}



