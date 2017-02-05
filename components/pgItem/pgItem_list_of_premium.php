<?

# jalal7h@gmail.com
# 2017/02/04
# 1.1

add_layer( 'pgItem_list_of_premium', 'لیست آخرین ویژه ها', 'side', $repeat='N' );

function pgItem_list_of_premium( $rw_pagelayer ){
	
	$cache_key = __FUNCTION__.json_encode($rw_pagelayer);
	if( $cache_hit = cache( "hit", $cache_key, "10min" ) ){
		echo $cache_hit;
	
	} else {

		$layer_name = $rw_pagelayer['name'];
		
		$data = json_decode($rw_pagelayer['data']);
		if(! $number_of_rows = intval($data->number_of_rows) ){
			$number_of_rows = 3;
		}

		if(! $rs_item = dbq(" SELECT * FROM `item` WHERE `flag`='2' AND `plan`!=0 ORDER BY rand() LIMIT $number_of_rows ") ){
			e();

		} else if(! dbn($rs_item) ){
			$content = '<br><center>موردی یافت نشد</center><br>';

		} while( $rw_item = dbf($rs_item) ){
			$content.= pgItem_list_brief_this( $rw_item );		
		}

		$content = layout_post_box( $layer_name, $content, 0, 1, $rw_pagelayer['pos'], $return=true );
		echo cache( "make", $cache_key, $content );	
	}

}


