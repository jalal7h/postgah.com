<?

$GLOBALS['block_layers']['pgItem_list_of_last'] = 'لیست آخرین آگهی ها';

function pgItem_list_of_last( $rw_pagelayer ){
	
	$cache_key = __FUNCTION__.json_encode($rw_pagelayer);
	if( $cache_hit = cache( "hit", $cache_key, "6hours" ) ){
		echo $cache_hit;
	
	} else {

		$layer_name = $rw_pagelayer['name'];
		
		$data = json_decode($rw_pagelayer['data']);
		if(! $number_of_rows = intval($data->number_of_rows) ){
			$number_of_rows = 3;
		}

		if(! $rs_item = dbq(" SELECT * FROM `item` WHERE 1 ORDER BY `date_updated` DESC LIMIT $number_of_rows ") ){
			e(__FUNCTION__,__LINE__);

		} else if(! dbn($rs_item) ){
			$content = convbox('موردی یافت نشد');

		} while( $rw_item = dbf($rs_item) ){
			$content.= pgItem_list_brief_this( $rw_item );		
		}

		ob_start();
		layout_post_box( $layer_name, $content, 0, 1, $rw_pagelayer['pos'] );
		$the_box = ob_get_contents();
		ob_end_clean();

		echo cache( "make", $cache_key, $the_box );

	}

}


