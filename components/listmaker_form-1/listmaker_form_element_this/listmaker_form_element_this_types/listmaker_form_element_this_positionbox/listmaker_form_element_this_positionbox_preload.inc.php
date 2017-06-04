<?

# jalal7h@gmail.com
# 2017/02/10
# 1.2

function listmaker_form_element_this_positionbox_preload(){
	
	$the_key = __FUNCTION__;

	if( function_exists('cache') and $cache_hit = cache( "hit", $the_key, "1hour" ) ){
		return $cache_hit;

	} else {

		position_remove_n_fix_unknowns();

		if(! $rs_parents = dbq(" SELECT `parent` FROM `position` WHERE 1 GROUP BY `parent` ") ){
			e();

		} else if(! dbn($rs_parents) ){
			e();

		} else while( $rw_parents = dbf($rs_parents) ){
			
			$parent_id = $rw_parents['parent'];

			if(! $rs_thisParent = dbq(" SELECT `id`,`name` FROM `position` WHERE `parent`='$parent_id' ORDER BY `name` ") ){

			} else if(! dbn($rs_thisParent) ){

			} else while( $rw_thisParent = dbf($rs_thisParent) ){
				$position_arr[ $parent_id ][ $rw_thisParent['id'] ] = $rw_thisParent['name'];
			}
			
		}

		if( sizeof($position_arr) ){

			$c.= "\npositionjson = new Array();\n\n";
			
			foreach( $position_arr as $i => $position_rw ){
				$position_rw_json = [];
				foreach( $position_rw as $id => $name) {
					if( $name = trim($name) ){
						$position_rw_json[] = '"'.$id.'":"'.$name.'"';
					}
				}
				if( sizeof($position_rw_json) ){
					$c.= "positionjson[$i]='{".implode(',', $position_rw_json)."}';\n\n";
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







