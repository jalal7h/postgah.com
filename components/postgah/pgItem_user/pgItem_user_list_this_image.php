<?

function pgItem_user_list_this_image( $rw ){

	if(! $rs_image = dbq(" SELECT * FROM `item_image` WHERE `item_id`='".$rw['id']."' ORDER BY `id` ASC LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_image = dbf($rs_image) ){
		return "image_list/no-pic-ads.png";
	
	} else {
		return "resize/100x100/".$rw_image['image'];
	}

}

