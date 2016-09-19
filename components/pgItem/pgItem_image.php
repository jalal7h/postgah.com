<?

# jalal7h@gmail.com
# 2016/09/19
# 1.1

define( 'pgItem_image_nopic', 'image_list/no-pic-ads.png' );

function pgItem_image( $rw_item, $numb_or_size=null, $size=null ){

	if( $numb_or_size==null ){
		$numb = 1;

	} else if( is_numeric($numb_or_size) ){
		$numb = $numb_or_size;
		$size = "";
	
	} else { // numb_or_size is the size
		$numb = 1;
		$size = $numb_or_size;
	}

	$image_array = pgItem_image_array( $rw_item );
	$numb--;

	$image_path = $image_array[ $numb ];

	if( $size and ($image_path != pgItem_image_nopic) ){
		$image_path = "resize/$size/$image_path";
	}

	$_URL_SLASH = _URL."/";

	if( substr( $image_path, 0, strlen($_URL_SLASH) ) != $_URL_SLASH ){
		$image_path = $_URL_SLASH . $image_path;
	}

	return $image_path;

}

function pgItem_image_array( $rw_item ){

	# memo #
	// return [
	// 	'data/item_image_memo/0'.rand(1,8).'.jpg',
	// 	'data/item_image_memo/0'.rand(1,8).'.jpg',
	// 	'data/item_image_memo/0'.rand(1,8).'.jpg',
	// 	'data/item_image_memo/0'.rand(1,8).'.jpg',
	// ];
	# #### #

	$item_id = $rw_item['id'];

	if(! $rs = dbq(" SELECT * FROM `item_image` WHERE `item_id`='$item_id' ORDER BY `id` ASC ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		$image_array[] = pgItem_image_nopic;
	
	} else {
		while( $rw = dbf($rs) ){
			if( file_exists($rw['image']) ){
				$image_array[] = $rw['image'];
			}
		}
	}

	return $image_array;

}

