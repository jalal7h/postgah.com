<?

# jalal7h@gmail.com
# 2016/11/16
# 1.0

function cat_detail( $cat_name ){

	if(! isset($GLOBALS['cat_items'][$cat_name]) ){
		return false;

	} else {
		return $GLOBALS['cat_items'][$cat_name];
	}

}









