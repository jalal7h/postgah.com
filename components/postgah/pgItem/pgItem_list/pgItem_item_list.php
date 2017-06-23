<?php

# jalal7h@gmail.com
# 2017/06/21
# 1.1

add_layer( 'pgItem_item_list', 'لیست آیتم‌ها', 'center', $repeat='0' );

function pgItem_item_list( $rw_pagelayer ){
	

	$count_in_page = 20;


	$p = intval($_REQUEST['p']);
	$start_from = $count_in_page * $p;

	?><div class="<?=__FUNCTION__?>"><?


	if( $cat_id = $_REQUEST['cat_id'] ){
		if(! $rw_cat = table("cat", $cat_id) ){
			return e();
		}
	}


	# list e subgroup ha
	if( $rw_cat ){

		# ## # ## # ## 
		$cache_key = "[cat_id]";
		if( $cache_hit = cache( "hit", $cache_key, "10m" ) ){
			echo $cache_hit;
		
		# ## # ## # ## 
		} else {
			$cache_value = '<div class="head_and_subcat_wrapper">';

			$cat_name = $rw_cat['name'];
			$title = str_replace( '%CAT_NAME%', $cat_name, $rw_pagelayer['name'] );

			$cache_value.= '<div class="head"><span class="title">'.$title.'</span> <span class="count">('.pgCat_number_of_items($cat_id).')</span></div>';

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
		</div>';

	}




	# list e agahi ha

	# ## # ## # ## 
	
	$cache_key = 
		"[".
		( $rw_cat ? "cat_id," : "" ).
		"p".
		( strstr($_SERVER['QUERY_STRING'], '&ccf_') ? ",ccf_*" : "" ).
		"]";

	if( $cache_hit = cache( "hit", $cache_key ) ){
		echo $cache_hit;
	
	# ## # ## # ## 
	} else {
		
		# 
		# items
		$cache_value = '<div class="items">';
		
		if( $rw_cat ){
			$cat_query = " AND (`item`.`cat_serial` LIKE '%/$cat_id/%') ";
		}

		if( is_component('catcustomfield') ){
			$ccf_filterquery = catcustomfield_filterquery();
		}


		#################################
		
		$JOIN = "LEFT JOIN `plan` ON `item`.`plan` = `plan`.`id`";
		$WHERE = "WHERE 1 $q_query $cat_query $ccf_filterquery AND `item`.`flag`='2' AND `item`.`expired`='0'";
		$ORDER = "ORDER BY `plan`.`pin_in_own_cat` DESC, `item`.`date_updated` DESC";
		$LIMIT = "LIMIT $start_from , $count_in_page";

		$query = " SELECT `item`.*, `plan`.`pin_in_own_cat` FROM `item` $JOIN $WHERE $ORDER $LIMIT ";

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
		
		echo cache( "make", $cache_key, $cache_value );

	}



	?></div><? // __FUNCTION__

}

