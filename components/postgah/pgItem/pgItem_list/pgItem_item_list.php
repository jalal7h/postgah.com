<?php

# jalal7h@gmail.com
# 2017/07/31
# 1.4

add_layer( 'pgItem_item_list', 'لیست آیتم‌ها', 'center', $repeat='0' );

function pgItem_item_list( $rw_pagelayer ){
	

	$count_in_page = 20;


	$p = intval($_REQUEST['p']);
	$start_from = $count_in_page * $p;

	?><div class="<?=__FUNCTION__?>"><?
	?><script>var _PAGE = '<?=_PAGE?>'; var ccf_main_cat_id = '<?=intval($_REQUEST['cat_id'])?>'; </script><?


	if( $cat_id = $_REQUEST['cat_id'] ){
		if(! $rw_cat = table("cat", $cat_id) ){
			return e();
		}
	}



	# list e subgroup ha
	if( $rw_cat ){

		# ## # ## # ## 
		$cache_key = '[cat_id,position_id,sort]';
		if( $cache_hit = cache( "hit", $cache_key, "10m" ) ){
			echo $cache_hit;
		
		# ## # ## # ## 
		} else {
			$cache_value = '<div class="head_and_subcat_wrapper">';

			$cat_name = $rw_cat['name'];
			$title = str_replace( '%CAT_NAME%', $cat_name, $rw_pagelayer['name'] );

			$cache_value.= '<div class="head"><span class="title">'.$title.'</span> <span class="count">('.pgCat_number_of_items($cat_id).')</span>'.pgItem_item_list_sort().'</div>';

			#
			# sub cats
			if(! $rs_sub = dbq(" SELECT * FROM `cat` WHERE `flag`='1' AND `parent`='$cat_id' ORDER BY `prio` ASC, `name` ASC ") ){
				e();
			
			} else if(! dbn($rs_sub) ){
				//
			
			} else {
				$cache_value.= '<div class="subcat">';
				
				while( $rw_sub = dbf($rs_sub) ){
					$rw_sub['count'] = pgCat_number_of_items( $rw_sub['id'] );
					if( $rw_sub['count'] > 0 ){
						$list_of_live_sub[] = $rw_sub;
					}
				}

				if( sizeof($list_of_live_sub) ){
					foreach ($list_of_live_sub as $k => $rw_sub) {
						$cache_value.= '<a href="'.pgCat_link($rw_sub).'"><span class="title">'.$rw_sub['name'].'</span> <span class="count">('.$rw_sub['count'].')</span></a>';
					}
				}

				$cache_value.= '</div>'; // subcat
			}

			$cache_value.= '</div>'; // head_and_subcat_wrapper
			
			echo cache( "make", $cache_key, $cache_value );
			
		}

	} else {
		
		// if( $q = pgSearch_q() ){
		// 	$title = 'نتیج جستجوی <b>&quot;'.$q.'&quot;</b>';

		// # if its the top list
		// } else {
			$title = 'آرشیو همه آگهی ها <span class="count">('.pgCat_number_of_items($cat_id).')</span>';
		// }

		echo '
		<div class="head_and_subcat_wrapper">
			<div class="head">'.$title.'</div>
			<span class="count"></span>
		</div>';

	}


	# list e agahi ha
	# ## # ## # ## 
	
	$cache_key = '[cat_id,p,ccf_*,pictured_ads,postgah_sales,price_range,position_id,sort]';

	if( $cache_hit = cache( "hit", $cache_key, "10m" ) ){
		// echo "\n<!-- hit ".date('H:i:s')." -->\n";
		echo $cache_hit;
	
	# ## # ## # ## 
	} else {

		# 
		# items
		$cache_value = '<div class="items">';
		// $cache_value.= "\n<!-- make ".date('H:i:s')." -->\n";

		if( $rw_cat ){
			$cat_query = " AND (`item`.`cat_serial` LIKE '%/$cat_id/%') ";
		}

		if( is_component('catcustomfield') ){
			$ccf_filterquery = catcustomfield_filterquery();
		}


		#################################
		
		if( $_REQUEST['postgah_sales'] ){
			$salePostgah_q = " AND `sale_by_postgah`=1 ";
		}
		if( $_REQUEST['pictured_ads'] ){
			$picturedAds_q = " AND `item`.`id` IN (SELECT DISTINCT `item_image`.`item_id` FROM `item_image` WHERE `item_image`.`hide`=0) ";
		}
		if(! in_array( $_REQUEST['price_range'] , [ '', '0-n' ] ) ){
			list($prMin, $prMax) = explode('-', $_REQUEST['price_range']);
			$prMin = number_fa2en($prMin);
			$prMax = number_fa2en($prMax);
			$priceRange_q = " AND `item`.`cost` >= $prMin ";
			if( $prMax != 'n' ){
				$priceRange_q.= " AND `item`.`cost` <= $prMax ";
			}
		}
		if( $pos_id = intval($_REQUEST['position_id']) ){
			$pos_q = " AND `position_serial` LIKE '%/$pos_id/%' ";
		}

		switch( $_REQUEST['sort'] ){

			case 'cheapest':
				$second_order = " `item`.`cost` ASC ";
				$cost_q = " AND `item`.`cost` > 0 ";
				break;

			case 'mostExpensive':
				$second_order = " `item`.`cost` DESC ";
				$cost_q = " AND `item`.`cost` > 0 ";
				break;

			case 'mostVisited':
				$second_order = " `item`.`view` DESC ";
				break;

			case 'newest':
			default: 
				$second_order = " `item`.`date_updated` DESC ";

		}

		$JOIN = "LEFT JOIN `plan` ON `item`.`plan` = `plan`.`id`";
		$WHERE = "WHERE 1 $q_query $cat_query $ccf_filterquery $salePostgah_q $picturedAds_q $priceRange_q $pos_q $cost_q AND `item`.`flag`='2' AND `item`.`expired`='0'";
		$ORDER = "ORDER BY (`ppioc` * `inOwnCat`) DESC, ".$second_order;
		$LIMIT = "LIMIT $start_from , $count_in_page";

		$query = " SELECT IFNULL(`plan`.`pin_in_own_cat`,0) as `ppioc`, (`item`.`cat_id`='$cat_id') as `inOwnCat`, `item`.* FROM `item` $JOIN $WHERE $ORDER $LIMIT ";

		// echo "<div dir=ltr >$query</div>";

		#################################

		if(! $rs_item = dbq( $query ) ){
			e( dbe() );
		
		} else if(! dbn($rs_item) ){
			$cache_value.= convbox("هنوز آیتمی در این دسته ثبت نشده است.");

		} else while( $rw_item = dbf($rs_item) ){
			$cache_value.= pgItem_item_list_this( $rw_item );
		}

		if( strstr( $_SERVER['QUERY_STRING'] , '&ccf_' ) ){
			$link = _URL . "/?" . query_string_set( "p", "%%" );

		} else if(! $rw_cat ){
			$link = _URL . "/?" . query_string_set( "p", "%%" );

		} else {
			$link = pgCat_link( $rw_cat, $page_number="%%" );
		}

		$cache_value.= listmaker_paging( $query , $link, $count_in_page );
		$cache_value.= '</div>'; // items
		$count = que::get('listmaker_paging__count');
		$cache_value.= "<script>
		jQuery(document).ready(function($) {
			$('.head_and_subcat_wrapper .count').html('(".number_format($count).")');
		});
		</script>";
		
		echo cache( "make", $cache_key, $cache_value );

	}



	?></div><? // __FUNCTION__

}

