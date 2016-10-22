<?

# jalal7h@gmail.com
# 2016.08.29
# 1.0

$GLOBALS['block_layers_center']['pgSearch_item_list'] = 'جستجوی آیتم - لیست نتایج';

function pgSearch_item_list( $rw_pagelayer ){
	
	if(! $q = pgSearch_q() ){
		echo convbox("عبارت مورد نظر شما برای جستجو مناسب نیست");

	} else {

		# ## # ## # ## 
		$cache_key = __FUNCTION__ . "," . $q . "," . $_REQUEST['p'];
		if( $cache_hit = cache( "hit", $cache_key, "1day" ) ){
			echo $cache_hit;
			
		# ## # ## # ## 
		} else {
			
			$pse = pgSearch_engine( $q );

			$c.= '<div class="'.__FUNCTION__.'">';

			$c.= '<div class="head_and_subcat_wrapper">';
			$title = str_replace('%WORD%', $q, $rw_pagelayer['name']);

			$listmaker_paging__count = qpop('listmaker_paging__count');
			$c.= '<div class="head"><span class="title">'.$title.'</span>'.
				( $listmaker_paging__count ? ' <span class="count">('.$listmaker_paging__count.')</span>' : '' ).
				'</div>';
			
			#
			# sub cats
			if(! $rs_sub = dbq(" SELECT *, MATCH (`name`) AGAINST ('$q') AS relevance FROM `cat` WHERE `cat`='adsCat' AND MATCH (`name`) AGAINST ('$q' IN BOOLEAN MODE ) ORDER BY relevance DESC LIMIT 10 ") ){
				e(__FUNCTION__,__LINE__);
				echo dbe();
			
			} else if(! dbn($rs_sub) ){
				//
			
			} else {
				$c.= '<div class="subcat">';
				
				while( $rw_sub = dbf($rs_sub) ){
					$rw_sub['count'] = pgCat_number_of_items( $rw_sub['id'] );
					if( $rw_sub['count'] > 0 ){
						$list_of_live_sub[] = $rw_sub;
					}
				}

				if( sizeof($list_of_live_sub) ){
					foreach ($list_of_live_sub as $k => $rw_sub) {
						$c.= '<a href="'.pgCat_link($rw_sub).'"><span class="title">'.$rw_sub['name'].'</span> <span class="count">('.$rw_sub['count'].')</span></a>';
					}
				}

				$c.= '</div>'; // subcat
			}

			$c.= '</div>'; // head_and_subcat_wrapper

			if(! sizeof($pse) ){
				//
			
			} else foreach( $pse as $i => $rw_item ){
				$c.= pgItem_item_list_this( $rw_item );
			}

			if(! sizeof($pse) ){
				$c.= convbox("جستجوی شما نتیجه ای نداشت");
			}
			
			
			$c.= "</div>";

			#
			# paging
			$c.= qpop('pgSearch_engine_paging');

			#
			# echo all
			echo cache( "make", $cache_key, $c );

		}
	}
}

