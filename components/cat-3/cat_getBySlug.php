<?

# jalal7h@gmail.com
# 2017/04/29
# 1.0

function cat_getBySlug( $slug ){
	
	if(! $rw_cat = table('cat', ['slug'=>$slug] ) ){
		return false;
	
	} else {
		return $rw_cat[0];
	}

}


