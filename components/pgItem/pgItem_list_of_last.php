<?

# jalal7h@gmail.com
# 2017/02/03
# 1.1

add_layer( 'pgItem_list_of_last', 'لیست آخرین آگهی ها', 'side', $repeat='0' );

function pgItem_list_of_last( $rw_pagelayer ){
	
	$cache_key = __FUNCTION__.json_encode($rw_pagelayer);
	if( $cache_hit = cache( "hit", $cache_key, "10min" ) ){
		echo $cache_hit;
	
	} else {

		$layer_name = $rw_pagelayer['name'];
		
		$data = json_decode($rw_pagelayer['data']);
		if(! $number_of_rows = intval($data->number_of_rows) ){
			$number_of_rows = 3;
		}

		if(! $rs_item = dbq(" SELECT * FROM `item` WHERE `flag`='2' ORDER BY `date_updated` DESC LIMIT $number_of_rows ") ){
			e();

		} else if(! dbn($rs_item) ){
			$content = '<br><center>موردی یافت نشد</center><br>';

		} while( $rw_item = dbf($rs_item) ){
			$content.= pgItem_list_brief_this( $rw_item );		
		}

		$the_box = layout_post_box( $layer_name, $content, 0, 1, $rw_pagelayer['pos'], true );

		echo cache( "make", $cache_key, $the_box );

	}

}


