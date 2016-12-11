<?

# jalal7h@gmail.com
# 2016/12/11
# 1.0

function UDate_en( $U ){
	
	$Date = gmdate('Y/m/d H:i:s', $U)."|".gmdate('w', $U+86400);

	return $Date;
	 	
}



