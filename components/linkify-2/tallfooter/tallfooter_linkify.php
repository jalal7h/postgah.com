<?

# jalal7h@gmail.com
# 2017/01/09
# 1.1

$GLOBALS['tallfooter_element']['linkify'] = 'جعبه پیوند';

function tallfooter_linkify( $rw_tf ){

	if(! $cat_id = intval($rw_tf['content']) ){
		//

	} else if(! $cat = linkify_get( $cat_id ) ){
		//

	} else if( $cat['haveSub'] == 1 ){
		//

	} else {
		$c.= "<div class=\"head\">".$rw_tf['name']."</div>\n";
		
		if(! sizeof($cat['items']) ){
			dg();

		} else foreach( $cat['items'] as $id => $info ){
			$c.= "<a class=\"cl_l1_hover_before_i\" href=\"".linkify_URL_remove($info['url'])."\" >".$info['name']."</a>\n";
		}

	}

	if( $c != '' ){
		$grid = $rw_tf['grid'] ? " grid".$rw_tf['grid'] : "";
		$c = "<div class=\"this".$grid." ".$rw_tf['type']."\" >" . $c . "</div>";
	}


	return $c;

}


