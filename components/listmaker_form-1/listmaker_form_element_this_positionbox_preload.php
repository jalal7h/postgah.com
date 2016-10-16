<?

# jalal7h@gmail.com
# 2016/10/15
# 1.0

$GLOBALS['do_action'][] = 'listmaker_form_element_this_positionbox_preload';

function listmaker_form_element_this_positionbox_preload(){
	
	$the_key = $_REQUEST['info'];

	if( $cache_hit = cache( "hit", $the_key, "1hour" ) ){
		header('Content-Type: application/javascript');
		echo $cache_hit;

	} else {
		
		if(! $info = trim($_REQUEST['info']) ){
			ed(__FUNCTION__,__LINE__);
		} else if(! $info = str_dec($info) ){
			ed(__FUNCTION__,__LINE__);
		} else if(! $info = json_decode($info, true) ){
			ed(__FUNCTION__,__LINE__);
		}

		$position_name = $info['position_name'];
		// $c.= "positionjson_typename = new Array();\n\n";

		# set parent to 0, if parent is not known
		if(! $rs_fixpos = dbq(" SELECT `id` FROM `position` WHERE `parent`!=0 AND `parent` NOT IN (SELECT `id` FROM `position`) ") ){
			e(__FUNCTION__,__LINE__);
		
		} else if(! dbn($rs_fixpos) ){
			// echo "this is already fixed";

		} else {
			while( $rw_fixpos = dbf($rs_fixpos) ){
				$list_of_damn_ids[] = $rw_fixpos['id'];
			}
			$list_of_damn_ids = implode(',', $list_of_damn_ids);
			dbq(" UPDATE `position` SET `parent`='0' WHERE `id` IN ($list_of_damn_ids) ");
		}
		

		if(! $rs_parents = dbq(" SELECT `parent` FROM `position` WHERE 1 GROUP BY `parent` ") ){
			e(__FUNCTION__,__LINE__);

		} else if(! dbn($rs_parents) ){
			// no parent found
			e(__FUNCTION__,__LINE__);

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

			header('Content-Type: application/javascript');
			echo cache( "make", $the_key, $c );

		}


	}

}










