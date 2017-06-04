<?php

# jalal7h@gmail.com
# 2017/01/06
# 1.0

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
		unset($rw['hide']);
		
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



