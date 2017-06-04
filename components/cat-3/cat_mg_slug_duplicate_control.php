<?php

# jalal7h@gmail.com
# 2017/04/29
# 1.0

function cat_mg_slug_duplicate_control( $cat_name, $slug, $cat_id=NULL ){
	
	while( cat_mg_slug_duplicate_control_ifItsDuplicate( $cat_name, $slug, $cat_id ) ){

		if(! $vers = strrchr($slug, '~') ){
			$slug.= "~1";
		
		} else {
			
			$vers = substr($vers, 1 );
			$vers_length = strlen($vers);
			
			if(! is_numeric($vers) ){
				$slug.= "~1";

			} else {
				$vers++;
				$slug = substr( $slug, 0, -1 * $vers_length ) . $vers;
			}

		}

	}


	return $slug;

}





function cat_mg_slug_duplicate_control_ifItsDuplicate( $cat_name, $slug, $cat_id ){

	if( $cat_id ){
		$catId_query = " AND `id`!='$cat_id' ";
	}

	if(! $rs = dbq(" SELECT * FROM `cat` WHERE `cat`='$cat_name' AND `slug`='$slug' $catId_query LIMIT 1 ") ){
		ed();

	} else if( dbn($rs) ){
		return true;	
	
	}
	
	return false;

}











