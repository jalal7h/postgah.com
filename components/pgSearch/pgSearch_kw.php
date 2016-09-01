<?

# jalal7h@gmail.com
# 2016.08.31
# 1.0

$GLOBALS['block_layers_side']['pgSearch_kw'] = 'جستجوی آیتم - کلمات کلیدی';

function pgSearch_kw( $rw_pagelayer ){
	
	if(! $q = pgSearch_q() ){
		return false;

	} else {
		
		# ## # ## # ## 
		$cache_key = __FUNCTION__ . "," . $q . "," . $_REQUEST['p'];
		if( $c = cache( "hit", $cache_key, "1day" ) ){
			//
			
		# ## # ## # ## 
		} else {
			if(! $words = kword_search( $q, 50 ) ){
				//

			} else {

				$c = "<div class=\"".__FUNCTION__."\">\n";

				foreach( $words as $i => $word ){
					$c.= "<a href=\"".pgItem_tag_link( $word )."\">".$word."</a>\n";
				}

				$c.= "</div>";

			}
			
			#
			# echo all
			cache( "make", $cache_key, $c );

		}

		layout_post_box( $rw_pagelayer['name'], $c, $allow_eval=false, $framed=1 );

	}

}


