<?

# jalal7h@gmail.com
# 2017/06/09
# 1.1

function UDate_en( $U ){

	$Date = date('Y/m/d H:i:s', $U)."|".date('w', $U+86400);

	return $Date;
	 	
}



