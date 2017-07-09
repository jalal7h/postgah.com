<?

# jalal7h@gmail.com
# 2016/10/28
# 1.0

/* 
ID e linkify_config ro migire, va hameye item hasho, ba selsele marateb barmigardune + joziate khode linkify_config ro
*/

/*README*/

function linkify_get( $cat_id ){

	if(! $rw_cat = table('linkify_config', $cat_id) ){
		// e( $cat_id );
		return false;
	
	} else if( $rw_cat['flag'] == 0 ){
		dg();

	} else if( $rw_items = linkify_get_item( $cat_id ) ){
		$rw_cat = array_merge($rw_cat, $rw_items);
	}

	unset($rw_cat['id']);
	unset($rw_cat['flag']);
	unset($rw_cat['hide']);
	
	return $rw_cat;

}



