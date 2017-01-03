<?

# jalal7h@gmail.com
# 2017/01/03
# 1.1


#
# timezone
date_default_timezone_set("Asia/Tehran");


function U(){
	
	$U = gmdate("U");
	
	// if( ( gmdate("z") > 78 ) and ( gmdate("z") < 264 ) ){
	// 	$U+= 4.5 * 3600;

	// } else {
	// 	$U+= 3.5 * 3600;
	// }
	
	return $U;

}



