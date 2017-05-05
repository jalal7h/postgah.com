<?

# jalal7h@gmail.com
# 2017/04/29
# 1.0

function cat_getByID( $cat_id ){
	
	if(! $rw_cat = table('cat', ['id'=>$cat_id] ) ){
		return false;
	
	} else {
		return $rw_cat[0];
	}

}


