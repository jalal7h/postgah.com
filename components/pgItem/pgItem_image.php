<?

function pgItem_image( $rw_item, $numb=1 ){

	$image_array = pgItem_image_array( $rw_item );
	$numb--;

	return $image_array[ $numb ];
}

function pgItem_image_array( $rw_item ){

	# memo #
	// return ['data/item_image_memo/0'.rand(1,8).'.jpg'];
	# #### #

	$item_id = $rw_item['id'];

	if(! $rs = dbq(" SELECT * FROM `item_image` WHERE `item_id`='$item_id' ORDER BY `id` ASC ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		$image_array[] = 'image_list/no-pic-ads.png';
	
	} else {
		while( $rw = dbf($rs) ){
			if( file_exists($rw['image']) ){
				$image_array[] = $rw['image'];
			}
		}
	}

	return $image_array;

}

