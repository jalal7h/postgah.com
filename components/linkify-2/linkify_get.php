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


function linkify_get_item( $cat_id , $parent=0 ){

	if(! $rs = dbq(" SELECT * FROM `linkify` WHERE `cat`='$cat_id' AND `parent`='$parent' AND `flag`='1' ORDER BY `prio` ASC ") ){
		return false;

	} else if(! dbn($rs) ){
		return false;

	} else while( $rw = dbf($rs) ){
			
		# 
		# remove the ID, and move it into [id]
		$the_id = $rw['id'];
		unset($rw['id']);
		unset($rw['flag']);

		# 
		# add the `items` index to `rw` if it have any childs
		if( $rw_IX_items = linkify_get_item( $cat_id , $the_id ) ){
			$rw = array_merge( $rw, $rw_IX_items );
		}

		#
		# add to array
		$r['items'][ $the_id ] = $rw;

	}

	return $r;

}


