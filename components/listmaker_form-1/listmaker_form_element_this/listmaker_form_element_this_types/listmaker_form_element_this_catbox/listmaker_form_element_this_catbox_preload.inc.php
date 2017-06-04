<?

# jalal7h@gmail.com
# 2017/02/10
# 1.2

function listmaker_form_element_this_catbox_preload( $cat_name ){

	$the_key = __FUNCTION__ . $cat_name;

	if( function_exists('cache') and $cache_hit = cache( "hit", $the_key, "1hour" ) ){
		return $cache_hit;

	} else {
		
		$list_of_cat[] = "0";

		while( sizeof($list_of_cat) ){

			$parent = array_pop($list_of_cat);

			if(! $c = cat_fetch( $cat_name, $parent ) ){
				continue;
			
			} else {

				foreach( $c as $rw_cat_id => $rw_cat_name ){
					array_push( $list_of_cat, $rw_cat_id );
				}

				$cat_arr[ $parent ] = $c;

			}

		}


		if( sizeof($cat_arr) ){

			$c.= "\ncatjson = new Array();\n\n";

			foreach( $cat_arr as $i => $cat_rw ){
				$cat_rw_json = [];
				foreach( $cat_rw as $id => $name) {
					if( $name = trim($name) ){
						$cat_rw_json[] = '"'.$id.'":"'.$name.'"';
					}
				}
				if( sizeof($cat_rw_json) ){
					$c.= "catjson[$i]='{".implode(',', $cat_rw_json)."}';\n\n";
				}
			}

			#
			# cache defined
			if( function_exists('cache') ){
				return cache( "make", $the_key, $c );
			
			# 
			# if cache is not defined
			} else {
				return $c;
			}

		}



	}

}








